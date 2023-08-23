# Класс для передачи сообщений в текстовой среде

Классы **\AlexVenga\TestDTO\Message**, **\AlexVenga\TestDTO\Message\Meta**, **\AlexVenga\TestDTO\Message\Event**,
**\AlexVenga\TestDTO\Message\Payload** предназначен для передачи объекта-сообщения между экземплярами приложения в
текстовом формате.

Для отправки класса **Message**, **Meta**, **Event** или **Payload** в виде текста, достаточно сериализовать его в
строку
методом **serialize()**

```php
$message = new \AlexVenga\TestDTO\Message();
$string = $message->serialize();
```

Для десериализации строки в класс предусмотренн метод **unserialize($string)**

```php
$message = \AlexVenga\TestDTO\Message::unserialize($string);
```

## Спецификация классов

### Общая информация для классов _Message_, _Meta_, _Event_ и _Payload_

Данные классы реализуют интерфейс **AlexVenga\TestDTO\Interfaces\Serializable** с двумя методами для сериализации и
десериализации объекта

```php
public function serialize(): string;
public static function unserialize(string $data): static;
```

Данные методы реализованны в трейте **AlexVenga\TestDTO\Traits\HasSerialization**

### \AlexVenga\TestDTO\Message

Основной класс сообщения, может включать в себя следующие поля:

- **meta** (Мета-информация сообщения, является экземпляром класса **\AlexVenga\TestDTO\Message\Meta**)
- **event** (Событие передаваемое в сообщении, является экземпляром класса **\AlexVenga\TestDTO\Message\Event**)
- **payload** (Основная полезная нагрузка сообщения для передачи связанных с сообщением данных, является экземпляром
  класса **\AlexVenga\TestDTO\Message\Payload**)

Для доступа к полям класса **Message** используются геттеры и fluent-сеттеры.

_При вызове метода-сеттера без параметров соответсвующее поле будет очищено!_

### Общая информация для классов _Meta_, _Event_ и _Payload_

Классы наследуются от класса **AlexVenga\TestDTO\Message\DTOWithData**

Классы имеют поле **data**, представляющее собой ассоциативный массив с данными

Классы имеют методи геттер и fluent-сеттер

#### Метод-сеттер setData($key, $value)

- При вызове метода без параметров поле **data** будет очищено
- При передаче в параметр **$key** массива (массив должен быть ассоциативным), поле **data** будет замещено переданным
  массивом (параметр **$value** будет проигнорирован)
- При передаче в параметр **$key** строки, в поле **data** будет добавлено/обновлено значение из параметра **$value** по
  ключу
  **$key**

### \AlexVenga\TestDTO\Message\Event

Класс имеет дополнительное поле **$name** для описния названия вызванного события, а также геттер и fluent-сеттер к нему


