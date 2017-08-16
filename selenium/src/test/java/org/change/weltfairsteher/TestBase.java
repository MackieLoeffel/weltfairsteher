package org.change.weltfairsteher;

import lombok.Getter;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.remote.DesiredCapabilities;

import java.util.concurrent.TimeUnit;

/**
 * Unit test for simple App.
 */
public class TestBase {

    public static final String BASE_URL = "https://localhost/weltfairsteher/";

    @Getter
    protected static WebDriver driver;

    @BeforeClass
    public static void setup() {
        String geckodriverName = System.getProperty("os.name").toLowerCase().contains("win") ? "geckodriver.exe" : "geckodriver";

        System.setProperty("webdriver.gecko.driver", "src/test/resources/geckodriver/" + geckodriverName);

        DesiredCapabilities caps = DesiredCapabilities.firefox();
        caps.setAcceptInsecureCerts(true);
        driver = new FirefoxDriver(caps);
        driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
    }

    @After
    public void cleanUp(){
        driver.manage().deleteAllCookies();
    }

    @AfterClass
    public static void teardown() {
        driver.quit();
    }
}
