const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const iconManager = $('.function-icon_arrow_Manager')
const listManagerNav = $('.nav_bar-function_child_Manager')
const iconReport = $('.function-icon_arrow_Report')
const listReportNav = $('.nav_bar-function_child_Report')
const iconAssignment = $('.function-icon_arrow_Assignment')
const listAssignmentNav = $('.nav_bar-function_child_Assignment')

const iconHeader = $('.icon-nav')
const titleHeader = $('.title')
const gridSystem = $('.grid_system_column')
const contentNav = $$('.nav_bar-function-content')
const iconHeaderNav = $('.icon-nav')

const model = $('.model')
const btnAdd = $('.add-btn')

const navBar = {
  handleToggle: function() {
    function handleToggleManager() {
      iconManager.onclick = function(){
        listManagerNav.classList.toggle('none')
      }
    }
    handleToggleManager()

    function handleToggleReport() {
      iconReport.onclick = function(){
        listReportNav.classList.toggle('none')
      }
    }
    handleToggleReport()

    function handleToggleAssignment() {
      iconAssignment.onclick = function(){
        listAssignmentNav.classList.toggle('none')
      }
    }
    handleToggleAssignment()

    function handleToggleNavBar() {
      iconHeader.onclick = function(){
        titleHeader.classList.toggle('close')
        contentNav.forEach(element => {
          element.classList.toggle('close')
        });
        gridSystem.classList.toggle('close')
        iconHeaderNav.classList.toggle('close')
        listManagerNav.classList.add('none')
        listReportNav.classList.add('none')
        listAssignmentNav.classList.add('none')

      }
    }
    handleToggleNavBar()

    function toggleIconAdd(iconAdd) {
      iconAdd.onclick = function () {
          console.log(iconAdd)
          model.classList.add('model-display')
      }
    }
    toggleIconAdd(btnAdd)
  },

  start: function(){
    this.handleToggle()
  },
}
// khi phương thức .start được gọi -> tất cả các phương thức trong navBar sẽ được thực thi
navBar.start()

const body = {

}