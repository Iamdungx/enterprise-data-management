const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const iconManager = $('.function-icon_arrow_Manager')
const listManagerNav = $('.nav_bar-function_child_Manager')
const iconReport = $('.function-icon_arrow_Report')
const listReportNav = $('.nav_bar-function_child_Report')
const iconAssignment = $('.function-icon_arrow_Assignment')
const listAssignmentNav = $('.nav_bar-function_child_Assignment')


const navBar = {
  handleToggleManager: function(){
    iconManager.onclick = function(){
      listManagerNav.classList.toggle('none')
    }
  },
  handleToggleReport: function(){
    iconReport.onclick = function(){
      listReportNav.classList.toggle('none')
    }
  },
  handleToggleAssignment: function(){
    iconAssignment.onclick = function(){
      listAssignmentNav.classList.toggle('none')
    }
  },

  start: function(){
    this.handleToggleManager()
    this.handleToggleReport()
    this.handleToggleAssignment()
  },
}
// khi phương thức .start được gọi -> tất cả các phương thức trong navBar sẽ được thực thi
navBar.start()

const body = {

}