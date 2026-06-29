# `projects->update()`

**Endpoint:** `PUT /projects/{id}`

## Signature

```php
public function update(int $id, Project $project): Project
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$project` | `Project` | yes |

## Returns

`Project`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Project;

/** @var Client $client */
$result = $client->projects->update(id: 123, project: new Project(/* ... */));
```
