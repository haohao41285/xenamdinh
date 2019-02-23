
//Thay đổi thông báo lỗi 
jQuery.extend(jQuery.validator.messages, {
    required: "Trường này bắt buộc.",
    remote: "Please fix this field.",
    email: "Vui lòng điền một địa chỉ email.",
    url: "Vui lòng điền một đường truyền hữu dụng",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Vui lòng điền số.",
    digits: "Chỉ điền chữ số.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Mật Khẩu Không Trùng Khớp.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Vui lòng điền không quá {0} kí tự."),
    minlength: jQuery.validator.format("Vui lòng điền ít nhất {0} kí tự."),
    rangelength: jQuery.validator.format("Vui lòng điền độ dài {0} đến {1} kí tự."),
    range: jQuery.validator.format("Vui lòng điền giá trị trong khoảng {0} và {1}."),
    max: jQuery.validator.format("Vui lòng điền giá trị ít hơn hoặc bằng {0}."),
    min: jQuery.validator.format("Vui lòng điền giá trị nhỏ hơn hoặc bằng {0}.")
});



jQuery(document).ready(function($) {

    //Modal_signUp
	$('#form_sign_up').validate({
        ignore: "",

        rules: {
            'customer_info[last_name]': {
                required: true,
            },
            'customer_info[first_name]': {
                required: true,
            },
            'customer[email]': {
                required: true,
                email: true
            },
            'customer[password]': {
                required: true,
                minlength:6
            },
            'customer[confirm_password]': {
                required: true,
                minlength:6,
                equalTo:'#password'
            }
        },
        highlight: function (element) 
        {
            
        },
        unhighlight: function (element) 
        {
            
        },
        errorPlacement: function (error, element) 
        {
            error.insertAfter($(element).parents('.form-group'));
        },
        
    });
    $('#form_xe_khach').validate({
        ignore: "",

        rules: {
            'ten_xe': {
                required: true,
            },
            'thoi_gian[thoi_gian_di]': {
                required: true,
            },
            'thoi_gian[thoi_gian_ve]': {
                required: true,
            },
            'tinh': {
                required: true,
            },
            'huyen': {
                required: true,
            },
            'xa': {
                required: true,
            },
            'lien_he_1': {
                required: true,
                minlength:10,
                maxlength:12,
                number:true
            },
            'lien_he_2': {
                minlength:10,
                maxlength:12,
                number:true
            },
        },
        highlight: function (element) 
        {
            
        },
        unhighlight: function (element) 
        {
            
        },
        errorPlacement: function (error, element) 
        {
            error.insertAfter($(element).parents('.form-group'));
        },
        
    });
    $('#form_taxi').validate({
        ignore: "",

        rules: {
            'ten_xe': {
                required: true,
            },
            'tinh': {
                required: true,
            },
            'huyen': {
                required: true,
            },
            'xa': {
                required: true,
            },
            'lien_he_1': {
                required: true,
                minlength:10,
                maxlength:12,
                number:true
            },
            'lien_he_2': {
                minlength:10,
                maxlength:12,
                number:true
            },
        },
        highlight: function (element) 
        {
            
        },
        unhighlight: function (element) 
        {
            
        },
        errorPlacement: function (error, element) 
        {
            error.insertAfter($(element).parents('.form-group'));
        },
        
    });
    $('#form_xe_tai').validate({
        ignore: "",

        rules: {
            'ten_xe': {
                required: true,
            },
            'tai_trong': {
                required: true,
                number: true,
            },
            'tinh': {
                required: true,
            },
            'huyen': {
                required: true,
            },
            'xa': {
                required: true,
            },
            'lien_he_1': {
                required: true,
                minlength:10,
                maxlength:12,
                number:true
            },
            'lien_he_2': {
                minlength:10,
                maxlength:12,
                number:true
            },
        },
        highlight: function (element) 
        {
            
        },
        unhighlight: function (element) 
        {
            
        },
        errorPlacement: function (error, element) 
        {
            error.insertAfter($(element).parents('.form-group'));
        },
        
    });

    $('#customer_login').validate({
        ignore: "",

        rules: {
            'email': {
                required: true,
                email:true
            },
            'password': {
                required: true,
            },
        },
        highlight: function (element) 
        {
            
        },
        unhighlight: function (element) 
        {
            
        },
        errorPlacement: function (error, element) 
        {
            error.insertAfter($(element).parents('.form-group'));
        },
        
    });
     $('#form_post_news').validate({
        ignore: "",

        rules: {
            'content': {
                required: true,
            },
        },
        highlight: function (element) 
        {
            
        },
        unhighlight: function (element) 
        {
            
        },
        errorPlacement: function (error, element) 
        {
            error.insertAfter($(element).parents('.form-group'));
        },
        
    });
     $('#form_infor_customer').validate({
        ignore: "",

        rules: {
            'name': {
                required: true,
            },
            'email': {
               email : true,
            },
            'phone': {
                required: true,
                number:true,
                minlength:10,
                maxlength:12,
            },
            'address': {
                required: true,
            }
        },
        highlight: function (element) 
        {
            
        },
        unhighlight: function (element) 
        {
            
        },
        errorPlacement: function (error, element) 
        {
            error.insertAfter($(element).parents('.form-group'));
        },
        
    });
     $('#form_contact').validate({
        ignore: "",

        rules: {
            'name': {
                required: true,
            },
            'email': {
                required: true,
                email:true,
            },
            'phone': {
                required: true,
                number:true,
                minlength:10,
                maxlength:15,
            },
            'message': {
                required: true,
                minlength:100
            },
        },
        highlight: function (element) 
        {
            
        },
        unhighlight: function (element) 
        {
            
        },
        errorPlacement: function (error, element) 
        {
            error.insertAfter($(element).parents('.form-group'));
        },
        
    });
});