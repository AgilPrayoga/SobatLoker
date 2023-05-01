/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/login.blade.php",
    "./resources/views/home.blade.php", 
    "./resources/views/joblists.blade.php", 
    "./resources/views/register.blade.php",
    "./resources/views/detail.blade.php",
    
    "./resources/views/IsLogin/home.blade.php",
    "./resources/views/IsLogin/joblists.blade.php",
    "./resources/views/IsLogin/profile.blade.php",
    "./resources/views/IsLogin/myjob.blade.php",
    
    "./resources/views/Dashboard/corporationPage.blade.php",
    "./resources/views/Dashboard/index.blade.php",
    "./resources/views/Dashboard/create.blade.php",
    "./resources/views/Dashboard/joblists.blade.php",
    "./resources/views/Dashboard/editForm.blade.php",
    "./resources/views/Dashboard/jobvacancy.blade.php",
    
    "./resources/views/Layout/isGuest.blade.php",
    "./resources/views/Layout/joblists.blade.php",
    "./resources/views/Layout/isUser.blade.php",
    "./resources/views/Layout/isCompany.blade.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
]
}
