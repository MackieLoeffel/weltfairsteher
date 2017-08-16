package org.change.weltfairsteher.page;

import org.change.weltfairsteher.TestBase;

public class AdminPage {
    public static final String URL = TestBase.BASE_URL + "admin.php";

    public static void open() {
        TestBase.getDriver().get(URL);
    }
}
