$(document).ready(function () {

    setTimeout(function () {
        $(".alert").fadeOut();
    }, 5000);

    var expense_amt = $("#expense_amt");
    var expense_date = $("#expense_date");
    var spend_by = $("#spend_by");

    expense_date.datepicker({
        dateFormat: "yy-mm-dd"
    });

    $("#btn_add_exp").click(function (e) {
        e.preventDefault();
        removeErrMsg();

        if (expense_amt.val() === ''){
            expense_amt.addClass("error-input");
            expense_amt.next().text("Expense amount is required");
            // expense_amt.next().addClass("show");
            expense_amt.next().fadeIn();
        } else if (expense_amt.val() === '0'){
            expense_amt.addClass("error-input");
            expense_amt.next().text("Expense amount could not be '0'");
            expense_amt.next().fadeIn();
        }
        if (expense_date.val() === ''){
            expense_date.addClass("error-input");
            expense_date.next().text("Enter expense date");
            // expense_date.next().addClass("show");
            expense_date.next().fadeIn();
        }
        if (spend_by.val() === ''){
            spend_by.addClass("error-input");
            spend_by.next().text("Please select one spender");
            // spend_by.next().addClass("show");
            spend_by.next().fadeIn();
        }
        remErrMsgDelay();

        if(expense_amt.val() !== '' && expense_date.val() !== '' && spend_by.val() !== '') {
            let form = $("#add_expense");
            let form_data = form.serialize();
            var inputs = form.find("input, select, button, textarea");

            function addExpense() {
                $('#loader-text').html("WORKING...");
                $('#loader-modal').removeClass('hide');
                $.ajax({
                    url: 'api?add-ledger',
                    type: "POST",
                    data: form_data,
                    dataType: 'json',
                    success: function(result){
                        $('#loader-modal').addClass('hide');
                        if (result.status === 'success'){
                            sweetAlert.fire("Great!", result.message, "success").then(function () {
                                inputs.val('');
                                $("#expense_note").focus();
                            });
                        } else {
                            sweetAlert.fire("Ops!", result.message, result.status)
                        }
                    },
                    error: function (xhr,status,error) {
                        $('.loading-modal').addClass('hide');
                        sweetAlert.fire("Ops!", 'Something went wrong!', "error");
                    },

                });
            }

            alertify.confirm(
                'Confirmation',
                'Do you want to add the expanse?',
                addExpense,
                function(){ alertify.error('Declined').delay(2) }
            ).setting({
                'labels': {ok: 'Yes', cancel: 'No'},
                'movable': false
            }).autoCancel(5);

        }

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
            remErrMsgDelay();
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
    expense_date.focus(function () {
        $(this).next().fadeOut();
        $(this).removeClass("error-input");
    });
    expense_date.change(function () {
        $(this).next().fadeOut();
        $(this).removeClass("error-input");
    });

    expense_date.keypress(function (e) {
        if(e.keyCode !== 9 || e.keyCode !== 13){
            expense_date.addClass("error-input");
            expense_date.next().text("Choose date from the popup calender");
            expense_date.next().fadeIn();
            remErrMsgDelay();
            return false;
        }
    });

    spend_by.change(function () {
        $(this).next().fadeOut();
        $(this).removeClass("error-input");
    });

    $(".error-message").click(function () {
        $(this).fadeOut();
    });

    function remErrMsgDelay() {
        setTimeout(function () {
            $(".error-message").fadeOut();
        },3000);
    }

    function removeErrMsg() {
        $(".error-message").fadeOut();
        // $(".error-message").removeClass("show");
        $(".error-input").removeClass("error-input");
    }

    $("#show").click(function () {
        $('.loading-modal').removeClass('hide');
    });
});

