const webdriver = require("selenium-webdriver");
const chrome = require("selenium-webdriver/chrome");
const { By } = require("selenium-webdriver");

const test = async () => {
    const driver = new webdriver.Builder()
        .forBrowser("chrome")
        .setChromeOptions(new chrome.Options().headless())
        .build();

    try {
        await driver.get("http://localhost:8000");
        console.log("Test 1: If app starts successfully");
        const title = await driver.getTitle();
        console.log(title === "React App" ? "PASS" : "FAIL");

        console.log(
            "---------------------------------------------------------------------------"
        );

        console.log("Test 2: Register Functionality");
        await driver.get("http://localhost:8000/register");

        // Fill in the registration form fields
        await driver.findElement(By.name("cnic")).sendKeys("3640141412547");
        await driver.findElement(By.name("name")).sendKeys("John Doe");
        await driver
            .findElement(By.name("email"))
            .sendKeys("johndoe@example.com");
        await driver.findElement(By.name("number")).sendKeys("1234567890");
        await driver.findElement(By.name("password")).sendKeys("password123");

        // Submit the registration form
        await driver.findElement(By.className("form")).submit();

        // Wait for the page to load after registration
        await driver.wait(webdriver.until.titleIs("Home Page"), 5000);

        // Assert that the registration was successful
        const successMessage = await driver
            .findElement(By.className("success-message"))
            .getText();
        console.log(
            successMessage === "Your account has been created!"
                ? "PASS"
                : "FAIL"
        );

        console.log("Test 3: Login Functionality");
        await driver.get("http://localhost:8000/login");

        // Fill in the login form fields
        await driver
            .findElement(By.name("email"))
            .sendKeys("johndoe@example.com");
        await driver.findElement(By.name("password")).sendKeys("password123");

        // Submit the login form
        await driver.findElement(By.tagName("form")).submit();

        // Wait for the page to load after login
        await driver.wait(webdriver.until.titleIs("Home Page"), 5000);

        // Assert that the login was successful
        const loginMessage = await driver
            .findElement(By.className("success-message"))
            .getText();
        console.log(
            loginMessage === "Welcome, you are logged in!" ? "PASS" : "FAIL"
        );

        console.log("Test 4: Update User");
        console.log("Test: Update User Functionality");

        // Login as an admin
        await driver.get("http://localhost:8000/admin/login");

        // Fill in the admin login form fields
        await driver
            .findElement(By.name("email"))
            .sendKeys("admin@example.com");
        await driver.findElement(By.name("password")).sendKeys("adminpassword");

        // Submit the admin login form
        await driver.findElement(By.className("form")).submit();

        // Wait for the page to load after admin login
        await driver.wait(webdriver.until.titleIs("Admin Dashboard"), 5000);

        // Navigate to the edit user page
        await driver.get("http://localhost:8000/admin/users/1/edit");

        // Wait for the page to load after navigating to edit user page
        await driver.wait(webdriver.until.titleIs("Edit User Page"), 5000);

        // Assert that the edit user page is displayed
        const editUserPageTitle = await driver.getTitle();
        console.log(editUserPageTitle === "Edit User Page" ? "PASS" : "FAIL");

        // Update the user details
        await driver.findElement(By.name("cnic")).sendKeys("1234567890");
        await driver.findElement(By.name("name")).sendKeys("TalhaKhilji");
        await driver
            .findElement(By.name("email"))
            .sendKeys("johndoe@example.com");
        await driver.findElement(By.name("number")).sendKeys("1234567890");
        await driver
            .findElement(By.name("password"))
            .sendKeys("newpassword123");

        // Submit the update user form
        await driver.findElement(By.className("form")).submit();

        // Wait for the page to load after updating user details
        await driver.wait(webdriver.until.titleIs("Admin Dashboard"), 5000);

        // Assert that the user details have been updated
        const updatedUser = await driver.findElement(By.className("user-item"));
        const updatedUserName = await updatedUser
            .findElement(By.className("user-name"))
            .getText();
        const updatedUserEmail = await updatedUser
            .findElement(By.className("user-email"))
            .getText();
        console.log(updatedUserName === "Talha" ? "PASS" : "FAIL");
        console.log(updatedUserEmail === "talha@gmail.com" ? "PASS" : "FAIL");
    } catch (error) {
        console.log("Error: " + error);
    } finally {
        // Close the browser
        await driver.quit();
    }
    await driver.get("http://localhost:8000");

    console.log("Test case 5: Checking income tax form");

    // Navigate to the registration page
    await driver.get("http://localhost:8000/register");

    // Wait for the page to load after navigating to the registration page
    await driver.wait(webdriver.until.titleIs("Registration Page"), 5000);

    // Assert that the registration page is displayed
    const registrationPageTitle = await driver.getTitle();
    console.log(
        registrationPageTitle === "Registration Page" ? "PASS" : "FAIL"
    );

    // Fill in the registration form fields
    await driver.findElement(By.name("tax_year")).sendKeys("2023");
    await driver.findElement(By.name("nationality")).sendKeys("USA");
    await driver.findElement(By.name("address")).sendKeys("123 Main St");

    await driver.findElement(By.name("business_name")).sendKeys("My Business");
    await driver
        .findElement(By.name("business_address"))
        .sendKeys("456 Business Ave");
    await driver.findElement(By.name("gross_income")).sendKeys("50000");
    await driver.findElement(By.name("expenditures")).sendKeys("10000");

    await driver.findElement(By.name("company_name")).sendKeys("My Company");
    await driver
        .findElement(By.name("company_address"))
        .sendKeys("789 Company Rd");
    await driver.findElement(By.name("salary")).sendKeys("60000");

    // Submit the registration form
    await driver.findElement(By.tagName("form")).submit();

    // Wait for the page to load after submitting the registration form
    await driver.wait(webdriver.until.titleIs("Home Page"), 5000);

    // Assert that the user is redirected to the home page
    const homePageTitle = await driver.getTitle();
    console.log(homePageTitle === "Home Page" ? "PASS" : "FAIL");

    // Assert that the registration was successful
    const successMessage = await driver
        .findElement(By.className("success-message"))
        .getText();
    console.log(successMessage === "Registration successful" ? "PASS" : "FAIL");
    console.log("Test 6: Admin Login Functionality");
    await driver.get("http://localhost:8000/admin/login");

    // Fill in the admin login form fields
    await driver.findElement(By.name("email")).sendKeys("admin@example.com");
    await driver.findElement(By.name("password")).sendKeys("adminpassword");

    // Submit the admin login form
    await driver.findElement(By.tagName("form")).submit();

    // Wait for the page to load after admin login
    await driver.wait(webdriver.until.titleIs("Admin Dashboard"), 5000);

    // Assert that the admin login was successful
    const adminLoginMessage = await driver
        .findElement(By.className("success-message"))
        .getText();
    console.log(
        adminLoginMessage === "Welcome, you are logged in!" ? "PASS" : "FAIL"
    );

    // Assert that the index page is displayed
    const indexPageTitle = await driver.getTitle();
    console.log(indexPageTitle === "Admin Dashboard" ? "PASS" : "FAIL");

    // Assert that the user list is displayed
    const userList = await driver.findElement(By.id("user-list"));
    console.log(userList ? "PASS" : "FAIL");

    // Assert that the tax filer list is displayed
    const taxFilerList = await driver.findElement(By.id("tax-filer-list"));
    console.log(taxFilerList ? "PASS" : "FAIL");

    // Assert that the taxes filed list is displayed
    const taxesFiledList = await driver.findElement(By.id("taxes-filed-list"));
    console.log(taxesFiledList ? "PASS" : "FAIL");

    // Assert that the total user count is displayed
    const totalUsers = await driver.findElement(By.id("total-users")).getText();
    console.log(totalUsers ? "PASS" : "FAIL");

    // Assert that the total tax filer count is displayed
    const totalTaxFilers = await driver
        .findElement(By.id("total-tax-filers"))
        .getText();
    console.log(totalTaxFilers ? "PASS" : "FAIL");

    // Assert that the total taxes filed count is displayed
    const totalTaxesFiled = await driver
        .findElement(By.id("total-taxes-filed"))
        .getText();
    console.log(totalTaxesFiled ? "PASS" : "FAIL");

    console.log("Test 7: Delete User Functionality");

    // Login as an admin
    await driver.get("http://localhost:8000/admin/login");

    // Fill in the admin login form fields
    await driver.findElement(By.name("email")).sendKeys("admin@example.com");
    await driver.findElement(By.name("password")).sendKeys("adminpassword");

    // Submit the admin login form
    await driver.findElement(By.tagName("form")).submit();

    // Wait for the page to load after admin login
    await driver.wait(webdriver.until.titleIs("Admin Dashboard"), 5000);

    // Navigate to the admin page
    await driver.get("http://localhost:8000/admin");

    // Wait for the page to load after navigating to the admin page
    await driver.wait(webdriver.until.titleIs("Admin Page"), 5000);

    // Assert that the admin page is displayed
    const adminPageTitle = await driver.getTitle();
    console.log(adminPageTitle === "Admin Page" ? "PASS" : "FAIL");

    // Delete a user
    await driver.findElement(By.className("delete-user-button")).click();

    // Wait for the page to load after deleting the user
    await driver.wait(webdriver.until.titleIs("Admin Dashboard"), 5000);

    // Assert that the user has been deleted
    const deletedUser = await driver.findElements(By.className("user-item"));
    console.log(deletedUser.length === 0 ? "PASS" : "FAIL");

    console.log(
        "---------------------------------------------------------------------------"
    );

    console.log("Test 8: AJAX Functionality");

    // Navigate to the AJAX page
    await driver.get("http://localhost:8000/ajax");

    // Wait for the page to load after navigating to the AJAX page
    await driver.wait(webdriver.until.titleIs("AJAX Page"), 5000);

    // Assert that the AJAX page is displayed
    const ajaxPageTitle = await driver.getTitle();
    console.log(ajaxPageTitle === "AJAX Page" ? "PASS" : "FAIL");

    // Send an AJAX request
    await driver.findElement(By.id("search-input")).sendKeys("John");

    // Wait for the AJAX response
    await driver.sleep(2000);

    // Assert that the search results are displayed
    const searchResults = await driver.findElements(
        By.className("search-result")
    );
    console.log(searchResults.length > 0 ? "PASS" : "FAIL");
};

// Run the test case
test();
