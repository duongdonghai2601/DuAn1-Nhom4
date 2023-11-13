//Tạo mảng hình ảnh chứ 5 ảnh trong folder Pic
//Bài 1
let hinhAnh = [];
let viTri = 0;
function loadAnh() {
  for (let i = 0; i < 5; i++) {
    hinhAnh[i] = new Image();
    hinhAnh[i].src = "./image/anh" + i + ".png"; //lấy ảnh trong mục Pic và theo thứ tự 0->4 i là số thứ tự ảnh lưu tên ảnh đúng thứ tự
  }
}
//load tiêu đề ở trên ảnh
function loadTitle() {
  let viTriTitle = viTri + 1; //vì viTri hình bắt đầu là 0 nên tiêu đề mình phải tăng 1
  document.getElementById("title").innerHTML =
    viTriTitle + "/" + hinhAnh.length;
}

function slideshow(x) {
  switch (x) {
    case 1:
      viTri = 0;
      break;
    case 2:
      if (viTri > 0) {
        viTri--;
      }
      break;
    case 3:
      if (viTri < hinhAnh.length - 1) {
        viTri++;
      }
      break;
    case 4:
      viTri = hinhAnh.length - 1;
      break;
    default:
      break;
  }
  document.getElementById("slideshow").src = hinhAnh[viTri].src;
  loadTitle();
}
