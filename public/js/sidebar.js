const subMenus = document.querySelectorAll(".sub-menu"),
  buttons = document.querySelectorAll(".sidebar ul button");

const expandAndCollapseItem = (item) => {
  subMenus.forEach((menu) => (menu.style.height = "0px"));
  buttons.forEach((button) => button.classList.remove("active"));

  if (!item.nextElementSibling) {
    item.classList.add("active");
    return;
  }

  const subMenu = item.nextElementSibling,
    ul = subMenu.querySelector("ul");

  if (!subMenu.clientHeight) {
    subMenu.style.height = `${ul.clientHeight}px`;
    item.classList.add("active");
  } else {
    subMenu.style.height = "0px";
    item.classList.remove("active");
  }
};

var btn = document.querySelector('.toggle');
var btnst = true;
const expandAndCollapseSidebar=()=>{
    if(btnst == true) {
        document.querySelector('.toggle span').classList.add('toggle');
        document.getElementById('sidebar').classList.add('sidebarshow');
        btnst = false;
      }else if(btnst == false) {
        document.querySelector('.toggle span').classList.remove('toggle');}
};

const toggleSidebar = () => document.body.classList.toggle("open");
