$(function () {

    InitSliders();
    InitAssumption();
    InitItems();    

    calculate();
    setTimeout(function () {
        $("#instruction").show()
    }, 5000);
});

function InitAssumption() {
    $("#showAssumption").click(function () {
        $('#assumption').load("description/assumptions.html");
        $(this).hide();
        $("#hideAssumption").show().css("float","right");

    });
    $("#hideAssumption").click(function () {
        $('#assumption').html("");
        $(this).hide();
        $("#showAssumption").slideDown();
    });
}

function InitItems() {    
    $('ul#items input[type="checkbox"]').change(function () {
        var freeHours = parseFloat($('#free').text());
        if (freeHours == 0) {
            $(this).removeAttr("checked");
            alert('Release some free time!');
            return;
        }
        
        var cb = $(this);
        if (this.checked) {
            cb.attr("ord", new Date().getTime());
        }
        else {
            cb.removeAttr("ord");
        }

        CalcDates();
    });

    /*$('#saveGoal').click(function () {
      
    $.ajax({
            type: "POST",
            url: "http://posttestserver.com/post.php",
            data: 'calculations=' + $('#items-checkpoints').html(),
            dataType: "html",
            success: function (msg) {
                $('#saveGoal-result').html("Success! Your goals were saved.").show();
            }
        });
    });*/
}

/*function getSuccessLink(msg) {
    var filtered = msg;
    filtered = filtered.substr(filtered.indexOf('http://'));
    filtered = filtered.replace(/Post body was 0 chars long./, "");
    return filtered;
}*/

function CalcDates() {
    var freeHours = parseFloat($('#free').text());
    if (freeHours == 0) {
        $('#items-checkpoints').html("Not possible to complete your goal");
        $('#saveGoal, #saveGoal-result').hide();
        return;
    }

    var checkpoints = "";
    var dateReached = new Date();

    var arr = [];
    $('ul#items input[type="checkbox"]:checked').each(function () {
        arr.push($(this).attr("ord"));
    });
    arr.sort();

    var stageHours = 0;
    $.each(arr, function (index, value) {
        var b = $('ul#items input[type="checkbox"][ord=' + value + ']');
        if (b.length == 1) {
            stageHours = parseInt(b.val());

            var stageDays = stageHours / freeHours;
            dateReached.setDate(dateReached.getDate() + stageDays);

            checkpoints += b.next().text() + " can be reached by " + dateReached.toLocaleDateString() + "<br/>";
        }
    });

    $('#items-checkpoints').html(checkpoints);
    if (checkpoints != "") {
        $('#saveGoal').show();
        $('#items-checkpoints').show();
        
    }
    else
    {
        $('#saveGoal').hide();
    }
    $('#saveGoal-result').hide();
}

function InitSliders() {
    $('div[id^="slider-"]').each(function () {
        var divId = $(this).attr('id');
        var inputId = divId.replace(/slider-/, '');
        var inputVal = $('#' + inputId).val();

        $("#" + divId).slider({
            range: "max",
            min: 0,
            max: 12,
            step: 0.1,
            value: inputVal,
            orientation: "vertical",
            slide: function (event, ui) {
                var changeToVal = ToDecimal(ui.value);
                var otherSlidersVal = ToDecimal(GetSlidersTotal(divId));

                if (changeToVal + otherSlidersVal > 24) {
                   $('#error').show();
                    //console.log('not slided');
                    return false;
                }

                $("#" + inputId).val(ui.value);
                $('#error').hide();
                //console.log('slided to ' + ui.value);

                calculate();
                setTimeout(function () {
                    $("#step2").show()
                }, 5000);
                $("#instruction").hide();
            }
        });
    });

}

function ToDecimal(val) {
    return 1 * parseFloat(val).toFixed(2)
}

function GetSlidersTotal(excludeSliderId) {
    var total = 0;
    $('div[id^="slider-"]').each(function () {
        var divId = $(this).attr('id');
        if (divId != excludeSliderId) {
            total += ToDecimal($(this).slider("option", "value"));
        }
    });

    return total;
}

function calculate() {
    var total = 0;

    $('input.hours').each(function () {
        total += ToDecimal($(this).val());
    });
    var free = 24 - total;
    

    $('#free').text(ToDecimal(free));
    var free_weekly = free * 7;
    var free_monthly = free_weekly * 4;
    var free_yearly = free_monthly * 12;
    var free_life = free_yearly * 50;

    $('#free_weekly').text(ToDecimal(free_weekly));
    $('#free_monthly').text(ToDecimal(free_monthly));
    $('#free_yearly').text(ToDecimal(free_yearly));
    $('#free_life').text(ToDecimal(free_life));

    CalcDates();
}