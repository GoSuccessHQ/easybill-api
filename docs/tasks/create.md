# `tasks->create()`

**Endpoint:** `POST /tasks`

## Signature

```php
public function create(Task $task): Task
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$task` | `Task` | yes |

## Returns

`Task`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Task;

/** @var Client $client */
$result = $client->tasks->create(task: new Task(/* ... */));
```
