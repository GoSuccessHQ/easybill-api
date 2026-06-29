# `projects->create()`

**Endpoint:** `POST /projects`

## Signature

```php
public function create(Project $project): Project
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$project` | `Project` | yes |

## Returns

`Project`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Project;

/** @var Client $client */
$result = $client->projects->create(project: new Project(/* ... */));
```
