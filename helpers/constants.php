<?php
// chỉ được sửa những value text sau dấu " => " này
const MANAGE = [
    'title' => 'Quản Lý Hồ Sơ',
    'card_title' => 'Danh Sách Hồ Sơ',
    'create' => 'Thêm Mới Hồ Sơ',
    'edit' => 'Chỉnh Sửa Hồ Sơ',
];

const VALIDATE_LOGIN = 'Tài khoản và mật khẩu không được chứa các kí tự đặc biệt';
const LOGIN_FAILD = 'Thông tin đăng nhập không chính xác';
const UPLOAD_FILE_SUCCESS = 'Tải file lên thành công';
const UPLOAD_FILE_FAILED = 'Tải file lên thất bại vui lòng thử lại';
const UPDATE_SUCCESS = 'Cập nhật thông tin thành công';
const UPDATE_FAILED = 'Cập nhật thông tin thất bại';
const ADD_SUCCESS = 'Thêm mới thành công';

const BOX_DELETE = [
    'title' => 'Bạn có chắc muốn xóa không?',
    'content' => 'Sau khi xóa dữ liệu sẽ không thể khôi phục',
    'confirm' => 'Xác Nhận',
    'cancel' => 'Không'
];

const DELETE_ITEM_SUCCESS = 'Xóa thành công';
const DELETE_ITEM_FAILED = 'Xóa thất bại';
const UPDATE_ITEM_SUCCESS = 'Chỉnh sửa thành công';
const UPDATE_ITEM_FAILED = 'Chỉnh sửa thất bại vui lòng thử lại';

const ACTIVE_ACCOUNT = [
    'unbanned' => 1,
    'banned' => 2,
    'deleted' => 3,
];
const STATUS_MANAGE = [
    'wait' => [
        'text' => 'Chờ xử lý',
        'value' => 0
    ],
    'approve' => [
        'text' => 'Hoàn Thành',
        'value' => 1
    ],
    'cancel' => [
        'text' => 'Từ Chối',
        'value' => 2
    ],
];
