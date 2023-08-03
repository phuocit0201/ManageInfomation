<?php
// chỉ được sửa những value text sau dấu " => " này
const DASHBOARD = [
    'title' => 'Trung Tâm Điều Khiển',
    'card_title' => 'Trung Tâm Điều Khiển',
];
const MANAGE = [
    'title' => 'Quản Lý Hồ Sơ',
    'card_title' => 'Danh Sách Hồ Sơ',
    'create' => 'Thêm Mới Hồ Sơ',
    'edit' => 'Chỉnh Sửa Hồ Sơ',
];

const PROFILE_PERSONS = [
    'title' => 'Quản Lý Người Tiếp Nhận',
    'card_title' => 'Danh Sách Người Tiếp Nhận',
    'create' => 'Thêm Mới Người Tiếp Nhận',
    'edit' => 'Chỉnh Sửa Người Tiếp Nhận',
];

const PROFILE_TYPES = [
    'title' => 'Quản Lý Loại Hồ Sơ',
    'card_title' => 'Danh Sách Loại Hồ Sơ',
    'create' => 'Thêm Mới Loại Hồ Sơ',
    'edit' => 'Chỉnh Sửa Loại Hồ Sơ',
];

const CONTACT_METHODS = [
    'title' => 'Quản Lý Phương Thức Liên Hệ',
    'card_title' => 'Danh Sách Phương Thức Liên Hệ',
    'create' => 'Thêm Mới Phương Thức Liên Hệ',
    'edit' => 'Chỉnh Sửa Phương Thức Liên Hệ',
];

const PROFILE_INFOMATION = [
    'title' => 'Quản Lý Hồ Sơ',
    'card_title' => 'Danh Sách Hồ Sơ',
    'create' => 'Thêm Mới Hồ Sơ',
    'edit' => 'Chỉnh Sửa Hồ Sơ',
    'show' => 'Chi Tiết Hồ Sơ',
];

const ORGANIZATION = [
    'title' => 'Quản Lý Đơn Vị',
    'card_title' => 'Danh Sách Đơn Vị',
    'create' => 'Thêm Mới Đơn Vị',
    'edit' => 'Chỉnh Sửa Đơn Vị',
    'show' => 'Chi Tiết Đơn Vị',
];

const BRANCH = [
    'title' => 'Quản Lý Chi Bộ',
    'card_title' => 'Danh Sách Chi Bộ',
    'create' => 'Thêm Mới Chi Bộ',
    'edit' => 'Chỉnh Sửa Chi Bộ',
    'show' => 'Chi Tiết Chi Bộ',
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

const CREATE_ITEM_SUCCESS = 'Thêm mới thành công';
const CREATE_ITEM_FAILED = 'Thêm mới thất bại';
const DELETE_ITEM_SUCCESS = 'Xóa thành công';
const DELETE_ITEM_FAILED = 'Xóa thất bại';
const UPDATE_ITEM_SUCCESS = 'Chỉnh sửa thành công';
const UPDATE_ITEM_FAILED = 'Chỉnh sửa thất bại vui lòng thử lại';
const ITEM_NOT_FOUND = 'Không tìm thấy vui lòng thử lại';

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

const PROFILE_TYPE = [
    'title' => 'Quản Lý Loại Hồ Sơ',
    'card_title' => 'Danh Sách Loại Hồ Sơ',
];

const STATUS_PROFILE_INFO = [
    [
        'text' => 'Chờ kiểm duyệt',
        'value' => 1
    ],
    [
        'text' => 'Đã nhận hồ sơ',
        'value' => 2
    ],
    [
        'text' => 'Đang xử lý',
        'value' => 3
    ],
    [
        'text' => 'Trả hồ sơ về',
        'value' => 4
    ],
    [
        'text' => 'Chỉnh sửa và bổ sung',
        'value' => 5
    ],
    [
        'text' => 'Đã nhận lại Hồ sơ từ VPĐU',
        'value' => 6
    ],
];
