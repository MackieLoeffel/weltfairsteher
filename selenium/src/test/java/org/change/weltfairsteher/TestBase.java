package org.change.weltfairsteher;

import lombok.Getter;
import org.flywaydb.core.Flyway;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.support.ui.Select;

import java.util.concurrent.TimeUnit;

/**
 * Unit test for simple App.
 */
public class TestBase {

    public static final String BASE_URL = "https://localhost/weltfairsteher/";
    private static final String DB_URL = "jdbc:mysql://localhost:3306/website";
    private static final String DB_USER = "root";
    private static final String DB_PASSWORD = "";

    @Getter
    protected static WebDriver driver;

    @BeforeClass
    public static void baseSetup() {
        String geckodriverName = System.getProperty("os.name").toLowerCase().contains("win") ? "geckodriver.exe" : "geckodriver";

        System.setProperty("webdriver.gecko.driver", "src/test/resources/geckodriver/" + geckodriverName);

        DesiredCapabilities caps = DesiredCapabilities.firefox();
        caps.setAcceptInsecureCerts(true);
        driver = new FirefoxDriver(caps);
        driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);

        Flyway flyway = new Flyway();
        flyway.setDataSource(DB_URL, DB_USER, DB_PASSWORD);
        flyway.setLocations("filesystem:../flyway/migrations", "filesystem:../flyway/test");
        flyway.clean();
        flyway.migrate();
    }

    @After
    public void cleanUp(){
        driver.manage().deleteAllCookies();
    }

    @AfterClass
    public static void teardown() {
        driver.quit();
    }

    // helper methods
    public static void clickById(String id) {
        driver.findElement(By.cssSelector("#" + id)).click();
    }

    public void selectDropdownById(String id, String value) {
        Select select = new Select(TestBase.getDriver().findElement(By.cssSelector("#" + id)));
        select.selectByVisibleText(value);
    }
}
