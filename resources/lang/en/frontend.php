<?php 
return[
	'required' => '( Các trường có dấu * là bắt buộc )',
	'header' =>[
		'signup' => [
			'title' =>'Đăng Kí',
			'last_name' => 'Họ',
			'first_name' =>'Tên',
			'gender' =>[
				1 =>'Nam',
				2 => 'Nữ'
			],
			'email' =>'Email',
			'password' => 'Password',
			'confirm_password' => 'Confirm Password',
			'chu_xe' => 'TÔI LÀ CHỦ XE',
			'if' =>'Nếu bạn là chủ xe thì đánh dấu vào ô này',
			'or' =>'Hoặc',
			'facebook' => 'FaceBook',
			'google' => 'Google',
			'haveAccount' => 'Bạn đã có tài khoản chưa',
		],

		'login'=>[
			'title'=>'Đăng Nhập',
			'email'=>'Email',
			'password'=>'Password',
			'remember_me'=>'Remember me',
			'forgot'=>'Quên mật khẩu ?',
			'facebook'=>'Facebook',
			'google'=>'Google',
			'haveNotAccount'=>'Bạn chưa có tài khoản ?',
			'error'=>'Thông tin đăng nhập không chính xác'

		],
		'info' =>[
			'title' =>'ĐIỀN THÔNG TIN',
			'toila' => 'Xe Tôi Là:',
			'lien_he_1' => 'Liên Hệ 1',
			'lien_he_2' => 'Liên Hệ 2',
			'dia_chi' => 'Địa Chỉ',
			'ten_nha_xe' => 'Tên Nhà Xe',
			'hoan_thanh' => 'Hoàn Thành',
			'ava' => 'Ảnh Đại Diện',

			'xe_khach' =>[
				'tuyen' => 'Tuyến',
				'title' =>'Xe Khách',
				'ngay_di' =>'Chọn Ngày Đi',
				'ngay_ve' =>'Chọn Ngày Về',
				'so_ghe' =>'Số Ghế'
			],

			'taxi' =>[
				'title' =>'Taxi',
				'so_ghe' => 'Số Ghế',
			],

			'xe_tai' =>[
				'title' =>'Xe Tải',
				'trong_tai' => 'Trọng Tải'
			]

		]
	]
];