package org.change.weltfairsteher.test;

import org.change.weltfairsteher.TestBase;
import org.change.weltfairsteher.page.AdminPage;
import org.change.weltfairsteher.page.LoginPage;
import org.junit.Test;

import static org.hamcrest.MatcherAssert.assertThat;
import static org.hamcrest.Matchers.is;

public class AdminTest extends TestBase {

    @Test
    public void loginTest() {
        LoginPage.loginAsAdmin();
        AdminPage.open();

        assertThat(driver.getCurrentUrl(), is(AdminPage.URL));
    }
}
