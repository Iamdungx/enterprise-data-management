const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const iconManager = $('.function-icon_arrow')
const listManagerNav = $('.nav_bar-function_child')


const navBar = {
  handleToggleManager: function(){
    iconManager.onclick = function(){
      listManagerNav.classList.toggle('none')
    }
  },

  

  start: function(){
    this.handleToggleManager()
  },
}
// khi phương thức .start được gọi -> tất cả các phương thức trong navBar sẽ được thực thi
navBar.start()

const body = {

}