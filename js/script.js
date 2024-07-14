// changing between signin and signup boxes
function changeView(){
    let signinBox = document.getElementById("signin-box");
    let signupBox = document.getElementById("signup-box");

    signinBox.classList.toggle("d-none");
    signupBox.classList.toggle("d-none");
}

// signup function
function signup(){
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let email = document.getElementById("email");
    let mobile = document.getElementById("mobile");
    let username = document.getElementById("username-signup");
    let password = document.getElementById("password-signup");

    let form = new FormData();
    form.append("firstname", firstname.value);
    form.append("lastname", lastname.value);
    form.append("email", email.value);
    form.append("mobile", mobile.value);
    form.append("username", username.value);
    form.append("password", password.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/signup.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                document.getElementById("signup-msg-box").innerHTML = "Signup successful. You can now login.";
                document.getElementById("signup-msg-box").className = "alert alert-success";
                document.getElementById("signup-msg-div").classList.remove("d-none");

                firstname.value = "";
                lastname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";
            } else {
                document.getElementById("signup-msg-box").innerHTML = response;
                document.getElementById("signup-msg-box").className = "alert alert-danger";
                document.getElementById("signup-msg-div").classList.remove("d-none");
            }
        }
    }
}

// signin function
function signin(){
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    let remember = document.getElementById("remember");

    let form = new FormData();
    form.append("username", username.value);
    form.append("password", password.value);
    form.append("remember", remember.checked);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/signin.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            console.log(response);
            if(response == "Success"){
                window.location.href = "home.php";
            } else {
                document.getElementById("signin-msg-box").innerHTML = response;
                document.getElementById("signin-msg-box").className = "alert alert-danger";
                document.getElementById("signin-msg-div").classList.remove("d-none");
            }
        }
    }
}

// admin signin function
function adminSignin(){
    let username = document.getElementById("admin-username");
    let password = document.getElementById("admin-password");

    let form = new FormData();
    form.append("username", username.value);
    form.append("password", password.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/adminsignin.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                window.location.href = "admin_dashboard.php";
            } else {
                document.getElementById("admin-signin-msg-box").innerHTML = response;
                document.getElementById("admin-signin-msg-box").className = "alert alert-danger";
                document.getElementById("admin-signin-msg-div").classList.remove("d-none");
            }
        }
    }
}

// loading users on admin dashboard user management
function loadUser(){
    let request = new XMLHttpRequest();
    request.open("GET", "processors/admin_load_users.php", true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            document.getElementById("users-table").innerHTML = response;
        }
    }
}

// update user status
function updateUserStatus(){
    let userId = document.getElementById("user-id");

    let form = new FormData();
    form.append("userId", userId.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/admin_update_user_status.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                loadUser();
                userId.value = "";
                document.getElementById("admin-um-msg").innerHTML = "User status updated successfully.";
                document.getElementById("admin-um-msg").className = "alert alert-success";
                document.getElementById("admin-um-msg-div").classList.remove("d-none");
                // remove the alert after 5 seconds
                setTimeout(function(){
                    document.getElementById("admin-um-msg-div").classList.add("d-none");
                }, 5000);
            } else {
                document.getElementById("admin-um-msg").innerHTML = response;
                document.getElementById("admin-um-msg").className = "alert alert-danger";
                document.getElementById("admin-um-msg-div").classList.remove("d-none");
            }
        }
    }
}

// reload page
function reload(){
    location.reload();
}

// admin brand register
function brandReg(){
    let brandName = document.getElementById("admin-brand");

    let form = new FormData();
    form.append("brandName", brandName.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/admin_brand_reg.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                brandName.value = "";
                document.getElementById("admin-brand-msg").innerHTML = "Brand registered successfully.";
                document.getElementById("admin-brand-msg").className = "alert alert-success";
                document.getElementById("admin-brand-msg-div").classList.remove("d-none");
                // remove the alert after 5 seconds
                setTimeout(function(){
                    document.getElementById("admin-brand-msg-div").classList.add("d-none");
                }, 5000);
            } else {
                document.getElementById("admin-brand-msg").innerHTML = response;
                document.getElementById("admin-brand-msg").className = "alert alert-danger";
                document.getElementById("admin-brand-msg-div").classList.remove("d-none");
            }
        }
    }
}

// admin category register
function categoryReg(){
    let categoryName = document.getElementById("admin-category");

    let form = new FormData();
    form.append("categoryName", categoryName.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/admin_category_reg.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                categoryName.value = "";
                document.getElementById("admin-category-msg").innerHTML = "Category registered successfully.";
                document.getElementById("admin-category-msg").className = "alert alert-success";
                document.getElementById("admin-category-msg-div").classList.remove("d-none");
                // remove the alert after 5 seconds
                setTimeout(function(){
                    document.getElementById("admin-category-msg-div").classList.add("d-none");
                }, 5000);
            } else {
                document.getElementById("admin-category-msg").innerHTML = response;
                document.getElementById("admin-category-msg").className = "alert alert-danger";
                document.getElementById("admin-category-msg-div").classList.remove("d-none");
            }
        }
    }
}

// admin color register
function colorReg(){
    let colorName = document.getElementById("admin-color");

    let form = new FormData();
    form.append("colorName", colorName.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/admin_color_reg.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                colorName.value = "";
                document.getElementById("admin-color-msg").innerHTML = "Color registered successfully.";
                document.getElementById("admin-color-msg").className = "alert alert-success";
                document.getElementById("admin-color-msg-div").classList.remove("d-none");
                // remove the alert after 5 seconds
                setTimeout(function(){
                    document.getElementById("admin-color-msg-div").classList.add("d-none");
                }, 5000);
            } else {
                document.getElementById("admin-color-msg").innerHTML = response;
                document.getElementById("admin-color-msg").className = "alert alert-danger";
                document.getElementById("admin-color-msg-div").classList.remove("d-none");
            }
        }
    }
}

// admin size register
function sizeReg(){
    let sizeName = document.getElementById("admin-size");

    let form = new FormData();
    form.append("sizeName", sizeName.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/admin_size_reg.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                sizeName.value = "";
                document.getElementById("admin-size-msg").innerHTML = "Size registered successfully.";
                document.getElementById("admin-size-msg").className = "alert alert-success";
                document.getElementById("admin-size-msg-div").classList.remove("d-none");
                // remove the alert after 5 seconds
                setTimeout(function(){
                    document.getElementById("admin-size-msg-div").classList.add("d-none");
                }, 5000);
            } else {
                document.getElementById("admin-size-msg").innerHTML = response;
                document.getElementById("admin-size-msg").className = "alert alert-danger";
                document.getElementById("admin-size-msg-div").classList.remove("d-none");
            }
        }
    }
}

// admin products register
function productReg(){
    productName = document.getElementById("admin-stock-product");
    productBrand = document.getElementById("admin-stock-brand");
    productCategory = document.getElementById("admin-stock-category");
    productColor = document.getElementById("admin-stock-color");
    productSize = document.getElementById("admin-stock-size");
    productDescription = document.getElementById("admin-stock-description");
    productImage = document.getElementById("admin-stock-image");

    let form = new FormData();
    form.append("productName", productName.value);
    form.append("productBrand", productBrand.value);
    form.append("productCategory", productCategory.value);
    form.append("productColor", productColor.value);
    form.append("productSize", productSize.value);
    form.append("productDescription", productDescription.value);
    // use files object to append the image
    form.append("productImage", productImage.files[0]);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/admin_product_reg.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                productName.value = "";
                productBrand.value = "";
                productCategory.value = "";
                productColor.value = "";
                productSize.value = "";
                productDescription.value = "";
                productImage.value = "";
                document.getElementById("admin-product-msg").innerHTML = "Product registered successfully.";
                document.getElementById("admin-product-msg").className = "alert alert-success";
                document.getElementById("admin-product-msg-div").classList.remove("d-none");
                // remove the alert after 5 seconds
                setTimeout(function(){
                    document.getElementById("admin-product-msg-div").classList.add("d-none");
                }, 5000);
            } else {
                document.getElementById("admin-product-msg").innerHTML = response;
                document.getElementById("admin-product-msg").className = "alert alert-danger";
                document.getElementById("admin-product-msg-div").classList.remove("d-none");
            }
        }
    }
}

// admin update stock
function updateStock(){
    productId = document.getElementById("admin-stock-product-select");
    productQuantity = document.getElementById("admin-stock-quantity");
    productUnitPrice = document.getElementById("admin-stock-unit-price");

    let form = new FormData();
    form.append("productId", productId.value);
    form.append("productQuantity", productQuantity.value);
    form.append("productUnitPrice", productUnitPrice.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/admin_update_stock.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            console.log(response);
            if(response == "Success"){
                productId.value = "";
                productQuantity.value = "";
                productUnitPrice.value = "";
                document.getElementById("admin-stock-msg").innerHTML = "Stock updated successfully.";
                document.getElementById("admin-stock-msg").className = "alert alert-success";
                document.getElementById("admin-stock-msg-div").classList.remove("d-none");
                // remove the alert after 5 seconds
                setTimeout(function(){
                    document.getElementById("admin-stock-msg-div").classList.add("d-none");
                }, 5000);
            } else {
                document.getElementById("admin-stock-msg").innerHTML = response;
                document.getElementById("admin-stock-msg").className = "alert alert-danger";
                document.getElementById("admin-stock-msg-div").classList.remove("d-none");
            }
        }
    }
}

// print screen
function printScreen(){
    let originalContent = document.body.innerHTML;
    let printContent = document.getElementById("print-area").innerHTML;

    document.documentElement.removeAttribute("data-bs-theme");
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
    document.documentElement.setAttribute("data-bs-theme", "dark");

}

// load products on home page
function loadProducts(page){
    let form = new FormData();
    form.append("page", page);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/load_products.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            document.getElementById("products-load").innerHTML = response;
        }
    }
}

// basic product search
function searchProducts(page){
    let product = document.getElementById("product-search");
    
    let form = new FormData();
    form.append("product", product.value);
    form.append("page", page);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/search_products.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            // console.log(response);
            document.getElementById("products-load").innerHTML = response;
        }
    }
}

// view advanced search
function viewAdvancedSearch(){
    let advancedSearch = document.getElementById("advanced-search");
    advancedSearch.classList.toggle("d-none");
}

// advanced product search
function advSearchProducts(page) {
    let color = document.getElementById("color");
    let category = document.getElementById("category");
    let brand = document.getElementById("brand");
    let size = document.getElementById("size");
    let minPrice = document.getElementById("min-price");
    let maxPrice = document.getElementById("max-price");

    var form = new FormData();
    form.append("page", page);
    form.append("color", color.value);
    form.append("category", category.value);
    form.append("brand", brand.value);
    form.append("size", size.value);
    form.append("minPrice", minPrice.value);
    form.append("maxPrice", maxPrice.value);

    var request = new XMLHttpRequest();
    request.open("POST", "processors/adv_search_products.php", true);
    request.send(form);

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            console.log(response);
            document.getElementById("products-load").innerHTML = response;

            color.value = "0";
            category.value = "0";
            brand.value = "0";
            size.value = "0";
            minPrice.value = "";
            maxPrice.value = "";
        }
    };

    
}