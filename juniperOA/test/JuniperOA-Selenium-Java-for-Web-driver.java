import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedCondition;
import org.openqa.selenium.support.ui.WebDriverWait;

public class QueryFormTest  {
    public static void main(String[] args) {
        WebDriver driver = new FirefoxDriver();

        // Open website
        driver.get("http://wanghong-yang.github.io/juniperOA/");
        
        // Find the table name field and send a value
        WebElement tableName = driver.findElement(By.id("inputTableName"));
        tableName.sendKeys("Test1");

        // Find the start time field and send a value
        WebElement startTime = driver.findElement(By.id("inputStartTime"));
        startTime.sendKeys("2011-08-18T13:46");

        // Find the end time field and send a value
        WebElement endTime = driver.findElement(By.id("inputEndTime"));
        endTime.sendKeys("2011-08-19T13:48");

        // Find the select field and select
        Select selects = new Select(driver.findElement(By.id("selectFields")));
        selects.selectByVisibleText("traffic");

        // Find the source vn op select field and select
        Select sourceVnOp = new Select(driver.findElement(By.id("selectSourceVnOp")));
        sourceVnOp.selectByVisibleText("=");

        // Find the source vn value select field and select
        Select sourceVnVal = new Select(driver.findElement(By.id("selectSourceVnName")));
        sourceVnVal.selectByVisibleText("backend-vn");

        // Find the source port op select field and select
        Select sourcePortOp = new Select(driver.findElement(By.id("selectSourcePortOp")));
        sourcePortOp.selectByVisibleText("=");

        // Find the source port value select field and select
        Select sourcePortVal = new Select(driver.findElement(By.id("selectSourcePortName")));
        sourcePortVal.selectByVisibleText("9000");

        // Find the destination vn op select field and select
        Select destVnOp = new Select(driver.findElement(By.id("selectDestinationVnOp")));
        destVnOp.selectByVisibleText("!=");

        // Find the destination vn value select field and select
        Select destVnVal = new Select(driver.findElement(By.id("selectDestinationVnName")));
        destVnVal.selectByVisibleText("frontend-vn");

        // Find the destination port op select field and select
        Select destPortOp = new Select(driver.findElement(By.id("selectDestinationPortOp")));
        destPortOp.selectByVisibleText("=");

        // Find the destination port value select field and select
        Select destPortVal = new Select(driver.findElement(By.id("selectDestinationPortName")));
        destPortVal.selectByVisibleText("9001");

        // Find the submit button
        WebElement submitBtn = driver.findElement(By.id("submitBtn"));

        // Click the button
        submitBtn.click();
        
        // Check the generation succeed by check the value in text field
        String expectedRes = '{
            "table_name": "Test1",
            "start_time": 1313675160000,
            "end_time": 1313761680000,
            "select_fields": [
                "traffic"
            ],
            "where_clause": [
                [
                    {
                        "name": "source_vn",
                        "value": "backend-vn",
                        "operator": "="
                    },
                    {
                        "name": "source_port",
                        "value": "9000",
                        "operator": "="
                    }
                ],
                [
                    {
                        "name": "destination_vn",
                        "value": "frontend-vn",
                        "operator": "!="
                    },
                    {
                        "name": "destination_port",
                        "value": "9001",
                        "operator": "="
                    }
                ]
            ]
        }';
        (new WebDriverWait(driver, 10)).until(new ExpectedCondition<Boolean>() {
            public Boolean apply(WebDriver d) {
                WebElement txtArea = d.findElement(By.id("JSONtxt"));
                return txtArea.getText().contains(expectedRes);
            }
        });
        
        //Close the browser
        driver.quit();
    }
}