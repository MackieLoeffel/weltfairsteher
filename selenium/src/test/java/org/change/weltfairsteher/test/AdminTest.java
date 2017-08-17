package org.change.weltfairsteher.test;

import lombok.val;
import org.change.weltfairsteher.TestBase;
import org.change.weltfairsteher.page.AdminPage;
import org.change.weltfairsteher.page.LoginPage;
import org.junit.Before;
import org.junit.Test;

import java.nio.file.Paths;

import static org.hamcrest.MatcherAssert.assertThat;
import static org.hamcrest.Matchers.is;

public class AdminTest extends TestBase {

    @Before
    public void setup() {
        LoginPage.loginAsAdmin();
        AdminPage.open();
    }

    @Test
    public void testLogin() {
        assertThat(driver.getCurrentUrl(), is(AdminPage.URL));
    }

    @Test
    public void testAddTeacher() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("addTeacher")) {
            box.insertIntoForm("email", "test@example.de");
            box.insertIntoForm("password", "a");
            box.insertIntoForm("password2", "a");
        }
    }

    @Test
    public void testChangeUser() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("changeUser")) {
            box.selectDropdown("user", "teacher@test.de");
            box.insertIntoForm("email", "change@example.de");
            box.insertIntoForm("password", "a");
            box.insertIntoForm("password2", "a");
        }
    }

    @Test
    public void testDeleteTeacher() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("deleteTeacher")) {
            box.selectDropdown("teacher", "sss@a.de");
        }
    }

    @Test
    public void testAddClass() throws Exception{
        try(val box = AdminPage.withOpenBoxAndSubmit("addClass")) {
            box.selectDropdown("teacher", "a@b.de");
            box.insertIntoForm("name", "TestClass");
        }
    }

    @Test
    public void testChangeClass() throws Exception{
        try(val box = AdminPage.withOpenBoxAndSubmit("changeClass")) {
            box.selectDropdown("class", "Elektrokürbis");
            box.insertIntoForm("name", "Elektrokürbis2");
            box.selectDropdown("teacher", "a@b.de");
        }
    }

    @Test
    public void testDeleteClass() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("deleteClass")) {
            box.selectDropdown("id", "Mc Do Not");
        }
    }

    @Test
    public void testAddChallenge() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("addChallenge")) {
            box.insertIntoForm("title", "TestChallenge");
            box.selectDropdown("category", "KLIMAWANDEL");
            box.selectDropdown("points", "5");
            box.selectDropdown("extrapoints", "5");
            box.selectDropdown("location", "Schule ohne Lehrkraft");
            box.insertIntoForm("description", "Das ist ein Test!");
        }
    }

    @Test
    public void testChangeChallenge() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("changeChallenge")) {
            box.selectDropdown("challenge", "Wasser1");
            box.insertIntoForm("name", "TestChallenge2");
            box.selectDropdown("category", "KLIMAWANDEL");
            box.selectDropdown("points", "5");
            box.selectDropdown("extrapoints", "5");
            box.selectDropdown("location", "Schule ohne Lehrkraft");
            box.insertIntoForm("description", "Das ist ein Test!");
        }
    }

    @Test
    public void testAcceptSelfmade() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("acceptSelfmade")) {
            selectDropdownById("selfmadeSelect", "Hallo!");
            box.selectDropdown("extrapoints", "5");
        }
    }

    @Test
    public void testDeleteChallenge() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("deleteChallenge")) {
            box.selectDropdown("id", "Wasser2");
        }
    }

    @Test
    public void testUpload() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("upload")) {
            box.selectDropdown("challenge", "Bio-Frühstück");
            clickById("teacher-pdf");
            box.insertIntoForm("file", Paths.get("src/test/resources/test.pdf").toAbsolutePath().toString());
        }
    }

    @Test
    public void testChangePicture() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("changePicture")) {
            box.selectDropdown("challenge", "Bio-Frühstück");
            box.insertIntoForm("file", Paths.get("src/test/resources/challenge-pic.png").toAbsolutePath().toString());
        }
    }

    @Test
    public void testChangeLeckerwissen() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("changeLeckerwissen")) {
            box.selectDropdown("lw", "Was ist vegan?");
            box.insertIntoForm("title", "Leckerwissen!");
            box.insertIntoForm("link", "https://www.test.de");
            box.selectDropdown("category", "KLIMAWANDEL");
            box.selectDropdown("type", "Artikel");
        }
    }

    @Test
    public void testDeleteLeckerwissen() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("deleteLWBox")) {
            box.selectDropdown("id", "Dürre in der EU");
        }
    }

    @Test
    public void testAddMilestone() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("addMilestone")) {
            box.insertIntoForm("points", "99");
            box.insertIntoForm("description", "Test");
        }
    }

    @Test
    public void testChangeMilestone() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("changeMilestone")) {
            box.selectDropdown("milestone", "20");
            box.insertIntoForm("points", "101");
            box.insertIntoForm("description", "Test2");
        }
    }

    @Test
    public void testDeleteMilestone() throws Exception {
        try(val box = AdminPage.withOpenBoxAndSubmit("deleteMilestoneBox")) {
            box.selectDropdown("id", "10");
        }
    }
}
