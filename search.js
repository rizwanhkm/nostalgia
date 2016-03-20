var rollNoDetails;
function search(searchterm, rollNo) {
    // console.log(rollNo.length);
    var regexp = new RegExp(searchterm, "i"),
        i,
        j,
        counter = 0,
        results = [],
        column;
    for (i = 0; i < rollNo.length; i = i + 1) {

        if (typeof (rollNo[i] != 'undefined')) {
            for (j = 0; j < Object.keys(rollNo[i]).length; j = j + 1) {
                column = Object.keys(rollNo[i])[j];
                if (regexp.test(rollNo[i][column])) {
                    results[counter] = rollNo[i];
                    counter = counter + 1;
                    break;
                }
            }
        }
    }
    // console.log(results.length);
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
    $("#rollnosearch" + number).keyup(function () {
        var offset = $(this).offset();
        offset.top -= 50;
        $('html, body').animate({
            scrollTop: offset.top
        });
        var searchterm = $("#rollnosearch" + number).val();
        var results = search(searchterm, rollNo);
        printResults(results, number);
        $("#searchResults" + number + " div").off();
        $("#searchResults" + number + " div").on("click", function () {
            var row = $(this).closest("tr").children();
            rollno = row[0].textContent;
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
                    $("#searchResultsMsg" + number).html("Nominated.").css({
                        'color': "#2E7D32"
                    });
                } else {
                    $("#searchResultsMsg" + number).html("Error.").css('color', "#F44336");
                }
            }).fail(function () {
                $("#searchResultsMsg" + number).html("Error.").css('color', "#F44336");
            });
        });
    });
}
$(document).ready(function () {
    $.ajax({
        url: 'getRollNoDetails.php',
        method: 'GET'
    }).done(function (data) {
        data = JSON.parse(data);
        // console.log(data);
        rollNoDetails = data;
        if (awardFor == 'M' || awardFor == 'F' || awardFor == 'C') {
        var rollNo = [],
            counter;
        counter = 0;
        // console.log(awardFor);

        for (var i = 0; i < rollNoDetails.length; i++) {
            if ((rollNoDetails[i].gender == awardFor) || (awardFor == 'C')) {
                // console.log(rollNoDetails[i].gender);
                rollNo[counter++] = rollNoDetails[i];
            }
        }
            // console.log(rollNo.length);
        searchfunction(1, rollNo);
    } else {
        // console.log("asdf");
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
