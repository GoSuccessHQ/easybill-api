# `tasks->update()`

**Endpoint:** `PUT /tasks/{id}`

## Signature

```php
public function update(int $id, Task $task): Task
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$task` | `Task` | yes |

## Returns

`Task`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Task;

/** @var Client $client */
$result = $client->tasks->update(id: 123, task: new Task(/* ... */));
```
