<?php
// Gerekli PHPUnit sınıfı
use PHPUnit\Framework\TestCase;

// 🎯 Test etmek istediğimiz sınıf
class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function divide($a, $b)
    {
        if ($b == 0) {
            throw new InvalidArgumentException("Bölme sıfıra yapılamaz");

        }
        return $a / $b;
    }
}

// ✅ Test sınıfı
class CalculatorTest extends TestCase
{
    private $calc; // Tüm testler tarafından kullanılacak değişken

    // ✅ Her testten önce çalışır
    protected function setUp(): void
    {
        $this->calc = new Calculator(); // Her test için yeni Calculator nesnesi oluşturulur
    }

    // ✅ Her testten sonra çalışır
    protected function tearDown(): void
    {
        unset($this->calc); // Bellekten silinir (gerekmese de iyi alışkanlıktır)
    }

    // Basit assertEquals örneği
    public function testEquals()
    {
        $this->assertEquals(5, 2 + 3);
    }

    public function testTrue()
    {
        $this->assertTrue(3 > 2);
    }

    public function testFalse()
    {
        $this->assertFalse(4 > 3);
    }

    public function testNull()
    {
        $x = null;
        $this->assertNull($x);
    }

    public function testInstanceOf()
    {
        $date = new DateTime();
        $this->assertInstanceOf(DateTime::class, $date);
    }

    public function testCount()
    {
        $arr = ['a', 'b', 'c'];
        $this->assertCount(3, $arr);
    }

    public function testStringContains()
    {
        $this->assertStringContainsString('world', 'hello world');
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        throw new InvalidArgumentException("Beklenen hata");
    }

    // 🔄 Artık her testte $this->calc kullanabiliriz

    public function testAddition()
    {
        $this->assertEquals(4, $this->calc->add(2, 2));
    }

    public function testDivisionException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->divide(10, 0);
    }
    /**
     * @group matematik
     */
    public function testDivision()
    {
        $this->assertEquals(5, $this->calc->divide(10, 2));
    }
    /**
     * @group bolme
     */
    public function testDivisionbolme()
    {
        $this->assertEquals(5, $this->calc->divide(10, 2));
    }

    /**
     * @dataProvider additionProvider //Çok veriyi test etmek için
     */
    public function testAdditionWithData($a, $b, $expected)
    {
        $this->assertEquals($expected, $this->calc->add($a, $b));
    }

    public static function additionProvider()
    {
        return [
            [2, 2, 4],
            [0, 5, 5],
            [-1, 1, 0],
            [100, 200, 300]
        ];
    }
    public function testMock()
    {
        // 1. SomeClass isimli sınıfın bir mock (taklit) nesnesini oluşturuyoruz.
        $mock = $this->createMock(SomeClass::class);

        // 2. Mock nesnesinin 'someMethod' isimli metoduna ne yapması gerektiğini söylüyoruz.
        //    Burada 'someMethod' çağrıldığında 'foo' değerini döndürmesini istiyoruz.
        $mock->method('someMethod')->willReturn('foo');

        // 3. 'someMethod' çağrısı yapıyoruz ve dönen sonucu test ediyoruz.
        //    Dönen değer 'foo' olduğu için assertEquals başarılı olacak.
    }

    }

/*    <?xml version="1.0" encoding="UTF-8"*/?><!--
<phpunit bootstrap="vendor/autoload.php"
         colors="true"
         verbose="true"
         stopOnFailure="false"
         >
    <testsuites>
        <testsuite name="Calculator Tests">
            <file>CalculatorTest.php</file>
        </testsuite>
    </testsuites>

    <groups>
        <include>
            <group>matematik</group>
        </include>
    </groups-->
