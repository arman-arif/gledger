$(document).ready(function () {
    $("#expense_date").datepicker({
        dateFormat: "yy-mm-dd"
    });

    setTimeout(function () {
        $(".alert").fadeOut();
    },2500);

    // var add_expense = gete('add_expense'); //$("#add_expense");
    var expense_amt = $("#expense_amt");
    var expense_date = $("#expense_date");
    var spend_by = $("#spend_by");

    $("#btn_add_exp").click(function (e) {
        e.preventDefault();
        removeErrMsg();

        if (expense_amt.val() == ''){
            expense_amt.addClass("error-input");
            expense_amt.next().text("Expense amount is required");
            // expense_amt.next().addClass("show");
            expense_amt.next().fadeIn();
        } else if (expense_amt.val() == '0'){
            expense_amt.addClass("error-input");
            expense_amt.next().text("Expense amount could not be '0'");
            expense_amt.next().fadeIn();
        }
        if (expense_date.val() == ''){
            expense_date.addClass("error-input");
            expense_date.next().text("Enter expense date");
            // expense_date.next().addClass("show");
            expense_date.next().fadeIn();
        }
        if (spend_by.val() == ''){
            spend_by.addClass("error-input");
            spend_by.next().text("Please select one spender");
            // spend_by.next().addClass("show");
            spend_by.next().fadeIn();
        }

        if(expense_amt.val() !== '' || expense_date.val() !== '' || spend_by.val() !== ''){

            // console.log(new FormData(add_expense));
            // $.ajax({
            //     url: '',
            //     success: function(result){
            //         $().html(result);
            //     }
            // });

            var form = $("#add_expense");
            var inputs = form.find("input, select, button, textarea");
            var serializedData = form.serialize();
            // inputs.prop("disabled", true);

            // request = $.ajax({
            //     url: "/form.php",
            //     type: "post",
            //     data: serializedData
            // });
            // sweetAlert.fire("Ops!","All fields are required.", "warning");


            $.post('api?add-ledger', serializedData, function(response) {
                console.log(response);
                // sweetAlert.fire("Great!","All fields are required.", "warning");
                // Log the response to the console
                // console.log("Response: "+response);
                // console.log(serializedData);
            });

        }

        setTimeout(function () {
            // $(".error-message").removeClass("show");
            $(".error-message").fadeOut();
        },3000);

    });

    $("#btn_clear").click(removeErrMsg);

    expense_amt.keypress(function(evt){
        var e = event || evt; // for trans-browser compatibility
        var charCode = e.which || e.keyCode;
        if (charCode > 31 && (charCode < 47 || charCode > 57)) {
            expense_amt.addClass("error-input");
            expense_amt.next().text("Only numbers are allowed!");
            // expense_amt.next().addClass("show");
            expense_amt.next().fadeIn();
            return false;
        }
        return true;
    });

    expense_amt.keydown(function () {
        $(this).next().fadeOut();
        // $(this).next().removeClass("show");
        $(this).removeClass("error-input");
    });

    expense_date.on('click',function () {
        $(this).next().fadeOut();
        $(this).removeClass("error-input");
    });
    expense_date.keydown(function () {
        expense_date.addClass("error-input");
        expense_date.next().text("Choose date from the popup calender");
        expense_date.next().fadeIn();
        return false;
    });

    spend_by.change(function () {
        $(this).next().fadeOut();
        $(this).removeClass("error-input");
    });

    $(".error-message").click(function () {
        $(this).fadeOut();
    });

    function removeErrMsg() {
        $(".error-message").fadeOut();
        // $(".error-message").removeClass("show");
        $(".error-input").removeClass("error-input");
    }

    function gete(id){
        return document.getElementById(id);
    }
});

