# Examples

Runnable example scripts for the easybill API client.

Set your API key first, then run any script:

```bash
export EASYBILL_API_TOKEN=your-api-key
php examples/customers.php
```

| Script | Shows |
| --- | --- |
| [bootstrap.php](bootstrap.php) | Shared client setup (required by the others) |
| [customers.php](customers.php) | Customer CRUD (create, read, update, delete) |
| [pagination.php](pagination.php) | One page vs. lazily iterating all pages |
| [documents.php](documents.php) | Create an invoice, complete it, download the PDF, send it |
| [error-handling.php](error-handling.php) | Catching the typed exception hierarchy |
| [rate-limiting.php](rate-limiting.php) | Configure the limit or plug in a custom limiter |
| [custom-transport.php](custom-transport.php) | Use your own HTTP stack via the `HttpClient` interface |

> The scripts perform real API calls (except the transport/limiter wiring demos).
> Run them against a test account.

See [docs/](../docs/) for a reference page on every resource method.
