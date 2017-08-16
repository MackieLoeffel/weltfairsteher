package org.change.weltfairsteher.page;

import org.change.weltfairsteher.TestBase;
import org.openqa.selenium.By;

public class LoginPage {

    public static final String URL = TestBase.BASE_URL + "login.php";

    public static void login(String user, String password) {
        TestBase.getDriver().get(URL);

        TestBase.getDriver().findElement(By.cssSelector("[name=\"email\"")).sendKeys(user);
        TestBase.getDriver().findElement(By.cssSelector("[name=\"password\"")).sendKeys(password);
        TestBase.getDriver().findElement(By.cssSelector("input[type=\"submit\"")).click();
    }

    public static void loginAsAdmin() {
        login("a@b.de", "a");
    }
}
