$('input#name').keyup(function(event) {

    var title, slug;

    //lấy text từ thẻ input title
    title = $(this).val();

    //đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //đổi ký tự có dấu thành không dấu
    slug = slug.replace(/a|á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi,'a');
    slug = slug.replace(/e|é|è|ẻ|ẹ|ẽ|ê|ế|ề|ể|ễ|ệ/gi,'e');
    slug = slug.replace(/i|í|ì|ỉ|ị|ĩ/gi,'i');
    slug = slug.replace(/o|ó|ò|ỏ|ọ|õ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi,'o');
    slug = slug.replace(/u|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi,'u');
    slug = slug.replace(/y|ý|ỳ|ỷ|ỹ|ỵ/gi,'y');
    slug = slug.replace(/đ/gi,'d');
    //Xóa các ký tự đặc biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|\_/gi,'');
    //đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi,'-');
    //đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //phòng trường hợp user nhập quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi,'-');
    slug = slug.replace(/\-\-\-\-/gi,'-');
    slug = slug.replace(/\-\-\-/gi,'-');
    slug = slug.replace(/\-\-/gi,'-');
    //xóa các ký tự gạch ngang ở đầu và cuối 
    slug = '@'+slug+'@';
    slug = slug.replace(/\@\-|\-\@|\@/gi,'');

    //In slug ra textbox có id="slug"
    $('input#slug').val(slug);
});