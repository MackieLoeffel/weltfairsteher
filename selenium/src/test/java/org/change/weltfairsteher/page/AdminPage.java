package org.change.weltfairsteher.page;

import lombok.RequiredArgsConstructor;
import org.change.weltfairsteher.TestBase;
import org.openqa.selenium.By;
import org.openqa.selenium.support.ui.Select;

import java.io.Closeable;
import java.io.IOException;

import static org.hamcrest.MatcherAssert.assertThat;
import static org.hamcrest.Matchers.is;

public class AdminPage {
    public static final String URL = TestBase.BASE_URL + "admin.php";

    public static void open() {
        TestBase.getDriver().get(URL);
    }


    public static AdminPageBox withOpenBoxAndSubmit(String formId) {
        TestBase.getDriver().findElement(By.xpath("//*[@id='" + formId + "']/preceding-sibling::div[@class='slide-down-header']/a")).click();

        return new AdminPageBox(formId);
    }

    @RequiredArgsConstructor
    public static class AdminPageBox implements Closeable {
        private final String formId;

        public void insertIntoForm(String field, String value) {
            TestBase.getDriver().findElement(By.cssSelector("#" + formId + " [name=\"" + field + "\"")).sendKeys(value);
        }

        public void selectDropdown(String field, String value) {
            Select select = new Select(TestBase.getDriver().findElement(By.cssSelector("#" + formId + " select[name=\"" + field + "\"")));
            select.selectByVisibleText(value);
        }

        public void close() throws IOException {
            TestBase.getDriver().findElement(By.cssSelector("#" + formId + " input[type=\"submit\"")).click();

            assertThat(TestBase.getDriver().findElement(By.cssSelector("#" + formId + " .result")).getText(), is("Erfolgreich!"));
        }
    }

}
