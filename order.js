$( document ).ready(function() {
    $("#btn").click(
		function(){
			sendAjaxForm('order-form', 'order.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(ajax_form, url) {
    $.ajax({
        url:         url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) {
        	if (response == 'success') {
                alert('Спасибо за заказ');
            }

            if (response == 'err_input') {
                alert('Ой, произошла ошибка. Попробуйте позже');
            }

            if (response == 'err_empty') {
                alert('Пожалуйста, заполните все поля');
            }
    	},
    	error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
    	}
 	});
}