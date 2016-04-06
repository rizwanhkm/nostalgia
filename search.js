var rollNoDetails;
function search(searchterm, rollNo) {
  var results = [],
    options = {
      caseSensitive: false,
      includeScore: false,
      shouldSort: true,
      tokenize: false,
      threshold: 0.6,
      location: 0,
      distance: 100,
      maxPatternLength: 32,
      keys: ["rollno","name"]
    };
  var fuse = new Fuse(rollNo, options);
  results = fuse.search(searchterm);
  return results;
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function printResults(results, number) {
    var i,
        j,
        row = "";
    // console.log(results);
    if (results.length === 0) {
        $("#searchResultsMsg" + number).show();
        $("#searchResultsMsg" + number).html("No Results Found");
        $("#searchResults" + number).find("tbody").empty();
    } else {
        $("#searchResultsMsg" + number).hide();
        $("#searchResults" + number).find("tbody").empty();
        row = "<tr>";
        var student = rollNoDetails[0];
        var noofcoloumns = Object.keys(student).length;
        for (i = 0; i < noofcoloumns - 1; i = i + 1) {
            column = capitalizeFirstLetter(Object.keys(student)[i]);
            row += "<td><div>" + column + "</div></td>";
        }
        row += "</tr>";
        $("#searchResults" + number).append(row);
        for (i = 0; i < results.length; i = i + 1) {
            row = "<tr>";
            for (j = 0; j < noofcoloumns - 1; j = j + 1) {
                column = Object.keys(student)[j];
                row += "<td><div>" + results[i][column] + "</div></td>";
            }
            row += "</tr>";
            $("#searchResults" + number).append(row);
        }
    }
}
function searchfunction(number, rollNo) {
    var typingTimer;
    var doneTypingInterval = 200;
    var $input = $("#rollnosearch" + number);
    $input.on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });
    $input.on('keydown', function () {
      clearTimeout(typingTimer);
    });
    function doneTyping () {
      var offset = $("#rollnosearch" + number).offset();
      offset.top -= 50;
      $('html, body').animate({
          scrollTop: offset.top
      },800);
      var searchterm = $("#rollnosearch" + number).val();
      var results = search(searchterm, rollNo);
      printResults(results, number);
      $("#searchResults" + number + " div").off();
      $("#searchResults" + number + " div").on("click", function () {
          var row = $(this).closest("tr").children();
          rollno = row[0].textContent;
          if(rollno === "Rollno"){
            return;
          }
          alert("You are Nominating " + row[1].textContent + " for " + award + " Award");
          $("#searchResults" + number).find("tbody").empty();
          $("#rollnosearch" + number).val("");
          url = "nominated.php?rollno" + number + "=" + rollno;
          console.log(url);
          $("#searchResultsMsg" + number).show();
          $("#searchResultsMsg" + number).html("Wait...").css('color', "#2E7D32");

          $.ajax({
              url: url,
              method: 'GET'
          }).done(function (data) {
              data = JSON.parse(data);
              console.log(data);
              if (data.status == "nominated") {
                  $("#searchResultsMsg" + number).html("Nominated. <a href ='awardlist.php'>Click Here</a> to go back to Awards List.").css({
                      'color': "#2E7D32"
                  });
              } else {
                  $("#searchResultsMsg" + number).html("Error.").css('color', "#F44336");
              }
          }).fail(function () {
              $("#searchResultsMsg" + number).html("Error.").css('color', "#F44336");
          });
      });
    }
}
$(document).ready(function () {
    $.ajax({
        url: 'getRollNoDetails.php',
        method: 'GET'
    }).done(function (data) {
        data = JSON.parse(data);
        rollNoDetails = data;
        if (awardFor == 'M' || awardFor == 'F' || awardFor == 'C') {
        var rollNo = [],
            counter;
        counter = 0;

        for (var i = 0; i < rollNoDetails.length; i++) {
            if ((rollNoDetails[i].gender == awardFor) || (awardFor == 'C')) {
                rollNo[counter++] = rollNoDetails[i];
            }
        }
        searchfunction(1, rollNo);
    } else {
        var rollNo1 = [],
            rollNo2 = [],
            counter1, counter2;
        counter1 = counter2 = 0;
        for (var i = 0; i < rollNoDetails.length; i++) {
            if (rollNoDetails[i].gender == awardFor[0]) {
                rollNo1[counter1++] = rollNoDetails[i];
            }
            if (rollNoDetails[i].gender == awardFor[1]) {
                rollNo2[counter2++] = rollNoDetails[i];
            }
        }
        searchfunction(1, rollNo1);
        searchfunction(2, rollNo2);
    }

    }).fail(function () {
        $(".message").html("Please Reload the Page").css('color', "#F44336");
    });


});
