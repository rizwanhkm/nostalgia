var rollNo = [{
    'rollno': '101111001',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }, {
    'rollno': '101111001',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }, {
    'rollno': '101111001',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }, {
    'rollno': '101111001',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }, {
    'rollno': '101111001',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }, {
    'rollno': '101111001',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }, {
    'rollno': '101111001',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }, {
    'rollno': '101111003',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }, {
    'rollno': '101111001',
    'name': 'asdf rted',
    'departmnet': '',
    'gender': 'M'
    }];
console.log(rollNo);
var search = function (searchterm, rollNo) {
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
    return results;
}
function printResults(results) {
        var i,
            j,
            row = "";
        if (results.length === 0) {
            $("#searchResultsMsg").show();
            $("#searchResultsMsg").html("No Results Found");
            $("#searchResults").find("tbody").empty();
        } else {
            $("#searchResultsMsg").hide();
            $("#searchResults").find("tbody").empty();
            row = "<tr>";
            for (i = 0; i < Object.keys(rollNo[i]).length-1; i = i + 1) {
                 column = Object.keys(results[0])[i];
                row += "<td><div>" + column+ "</div></td>";
            }
            row += "</tr>";
            $("#searchResults").append(row);
            for (i = 0; i < results.length; i = i + 1) {
                row = "<tr>";
                 for (j = 0; j < Object.keys(rollNo[i]).length-1; j = j + 1) {
                 column = Object.keys(results[0])[j];
                row += "<td><div>" + results[i][column] + "</div></td>";
                }
                row += "</tr>";
                $("#searchResults").append(row);
            }
        }
    }
$(document).ready(function () {
    $("#rollnosearch").keyup(function () {
        var offset = $(this).offset();
        offset.top -= 50;
        $('html, body').animate({
            scrollTop: offset.top
        });

        var searchterm = $("#rollnosearch").val();
        var results = search(searchterm, rollNo);
        console.log(searchterm);
        if (results.length === 0){
            console.log("No Results");
        }else{
            console.log(results);
        }
        printResults(results);
        $("#searchResults div").off();
        $("#searchResults div").on("click", function(){
                        var row = $(this).closest("tr").children();
                        rollno = row[0].textContent;
        });
    });
});

