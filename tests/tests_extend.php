<?php

include "test_inc.php";

class IssuesTest extends ScssUnitTest {

    public function test_extend_issue80(){
        $source = <<<END
.test {
	color: green;
	&:hover { color: red; }
}
.test2 {
    @extend .test;
}
END;
        $expected = <<<END
.test, .test2 {
  color: green;
}

.test:hover, .test2:hover {
  color: red;
}
END;
        $this->assertScss($source, $expected);
    }

}


$unit = new IssuesTest();
$unit->run();
