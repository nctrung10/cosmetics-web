<?php 
return [
    [
        'label' => 'Dashboard',     //tên menu
        'route' => 'admin.dashboard',   //đường dẫn
        'icon' => 'fa-home'         //icon của menu
    ],
    [ // Danh mục sản phẩm
        'label' => 'Quản lý danh mục',
        'route' => 'danhmucsanpham.index',
        'icon' => 'fa-clipboard-list',
    ],
    [ // Sản phẩm
        'label' => 'Quản lý sản phẩm',
        'route' => 'sanpham.index',
        'icon' => 'fa-hockey-puck',
        'items' => [
            [
                'label' => 'Danh sách sản phẩm',
                'route' => 'sanpham.index',
            ],
            [
                'label' => 'Thêm sản phẩm mới',
                'route' => 'sanpham.create',
            ],
        ]
    ],
    [ // Kho hàng
        'label' => 'Quản lý kho',
        'route' => 'sanpham.index',
        'icon' => 'fa-warehouse',
        'items' => [
            [
                'label' => 'Sản phẩm gần/đã hết',
                'route' => 'sanpham.warning',
            ],
            [
                'label' => 'Sản phẩm cận HSD',
                'route' => 'sanpham.expire',
            ],
        ]
    ],
    [ // Đơn hàng
        'label' => 'Quản lý đơn hàng',
        'route' => 'donhang.index',
        'icon' => 'fa-shopping-cart',
    ],
    [ // Tài khoản
        'label' => 'Quản lý tài khoản',
        'route' => 'taikhoan.index',
        'icon' => 'fa-user',
        'items' => [
            [
                'label' => 'Tài khoản khách hàng',
                'route' => 'taikhoan.customerindex',
            ],
            [
                'label' => 'Tài khoản admin',
                'route' => 'taikhoan.index',
            ],
        ]
    ],
    [ // Banner
        'label' => 'Quản lý banner',
        'route' => 'banner.index',
        'icon' => 'fa-image',
        'items' => [
            [
                'label' => 'Danh sách banner',
                'route' => 'banner.index',
            ],
            [
                'label' => 'Thêm banner',
                'route' => 'banner.create',
            ]
        ]
    ], 
    [ // Blog
        'label' => 'Quản lý bài viết',
        'route' => 'baiviet.index',
        'icon' => 'fa-newspaper',
        'items' => [
            [
                'label' => 'Danh sách bài viết',
                'route' => 'baiviet.index',
            ],
            [
                'label' => 'Thêm bài viết',
                'route' => 'baiviet.create',
            ]
        ]
    ], 
    [ // Thương hiệu
        'label' => 'Quản lý thương hiệu',
        'route' => 'thuonghieu.index',
        'icon' => 'fa-bold',    
    ],
    [ // Xuất xứ
        'label' => 'Quản lý xuất xứ',
        'route' => 'xuatxu.index',
        'icon' => 'fa-map-marked',    
    ],
    [ // Mã giảm giá
        'label' => 'Quản lý mã giảm giá',
        'route' => 'giamgia.index',
        'icon' => 'fa-receipt',
        
    ],
    [ // Khuyến mãi
        'label' => 'Quản lý khuyến mãi',
        'route' => 'khuyenmai.index',
        'icon' => 'fa-receipt',
    ], 


    [ // File/Ảnh
        'label' => 'Quản lý hình ảnh',
        'route' => 'admin.file',
        'icon' => 'fa-folder-open',
    ],

]
?>