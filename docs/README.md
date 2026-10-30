# API Reference

One page per resource method. See [examples/](../examples/) for runnable scripts.

## `attachments`

- [`list()`](attachments/list.md) — Fetch a single page of results.
- [`all()`](attachments/all.md) — Iterate lazily over every item across all pages.
- [`get()`](attachments/get.md)
- [`create()`](attachments/create.md)
- [`update()`](attachments/update.md)
- [`delete()`](attachments/delete.md)
- [`content()`](attachments/content.md) — Download the raw binary content of an attachment.

## `contacts`

- [`list()`](contacts/list.md) — Fetch a single page of a customer's contacts.
- [`all()`](contacts/all.md) — Iterate lazily over every contact of a customer across all pages.
- [`get()`](contacts/get.md)
- [`create()`](contacts/create.md)
- [`update()`](contacts/update.md)
- [`delete()`](contacts/delete.md)

## `customerGroups`

- [`list()`](customerGroups/list.md) — Fetch a single page of results.
- [`all()`](customerGroups/all.md) — Iterate lazily over every item across all pages.
- [`get()`](customerGroups/get.md)
- [`create()`](customerGroups/create.md)
- [`update()`](customerGroups/update.md)
- [`delete()`](customerGroups/delete.md)

## `customers`

- [`list()`](customers/list.md) — Fetch a single page of results.
- [`all()`](customers/all.md) — Iterate lazily over every item across all pages.
- [`get()`](customers/get.md)
- [`create()`](customers/create.md)
- [`update()`](customers/update.md)
- [`delete()`](customers/delete.md)
- [`transferSepaMandate()`](customers/transferSepaMandate.md) — Transfer the SEPA mandate of a customer to another payment provider.

## `discountPositionGroups`

- [`list()`](discountPositionGroups/list.md) — Fetch a single page of results.
- [`all()`](discountPositionGroups/all.md) — Iterate lazily over every item across all pages.
- [`get()`](discountPositionGroups/get.md)
- [`create()`](discountPositionGroups/create.md)
- [`update()`](discountPositionGroups/update.md)
- [`delete()`](discountPositionGroups/delete.md)

## `discountPositions`

- [`list()`](discountPositions/list.md) — Fetch a single page of results.
- [`all()`](discountPositions/all.md) — Iterate lazily over every item across all pages.
- [`get()`](discountPositions/get.md)
- [`create()`](discountPositions/create.md)
- [`update()`](discountPositions/update.md)
- [`delete()`](discountPositions/delete.md)

## `documentPayments`

- [`list()`](documentPayments/list.md) — Fetch a single page of results.
- [`all()`](documentPayments/all.md) — Iterate lazily over every item across all pages.
- [`get()`](documentPayments/get.md)
- [`create()`](documentPayments/create.md)
- [`delete()`](documentPayments/delete.md)

## `documents`

- [`list()`](documents/list.md) — Fetch a single page of documents.
- [`all()`](documents/all.md) — Iterate lazily over every document across all pages.
- [`get()`](documents/get.md)
- [`create()`](documents/create.md)
- [`update()`](documents/update.md)
- [`delete()`](documents/delete.md)
- [`done()`](documents/done.md) — Mark a document as done (completed).
- [`cancel()`](documents/cancel.md) — Cancel a document (creating a cancellation document).
- [`send()`](documents/send.md) — Send a document via the given channel.
- [`convert()`](documents/convert.md) — Convert a document into another type (e.g. an offer into an invoice).
- [`pdf()`](documents/pdf.md) — Download the document as a PDF.
- [`jpg()`](documents/jpg.md) — Download the document as a JPG image.
- [`downloadFile()`](documents/downloadFile.md) — Download the document file in the format configured on the document.
- [`versions()`](documents/versions.md) — List the versions of a document.
- [`version()`](documents/version.md) — Fetch a single version of a document.
- [`downloadVersionItem()`](documents/downloadVersionItem.md) — Download a single item of a document version.

## `logins`

- [`list()`](logins/list.md) — Fetch a single page of results.
- [`all()`](logins/all.md) — Iterate lazily over every item across all pages.
- [`get()`](logins/get.md)

## `pdfTemplates`

- [`list()`](pdfTemplates/list.md) — Fetch the full set of available PDF templates.
- [`all()`](pdfTemplates/all.md) — Fetch the available PDF templates as a plain list.

## `positionGroups`

- [`list()`](positionGroups/list.md) — Fetch a single page of results.
- [`all()`](positionGroups/all.md) — Iterate lazily over every item across all pages.
- [`get()`](positionGroups/get.md)
- [`create()`](positionGroups/create.md)
- [`update()`](positionGroups/update.md)
- [`delete()`](positionGroups/delete.md)

## `positions`

- [`list()`](positions/list.md) — Fetch a single page of results.
- [`all()`](positions/all.md) — Iterate lazily over every item across all pages.
- [`get()`](positions/get.md)
- [`create()`](positions/create.md)
- [`update()`](positions/update.md)
- [`delete()`](positions/delete.md)

## `postBoxes`

- [`list()`](postBoxes/list.md) — Fetch a single page of results.
- [`all()`](postBoxes/all.md) — Iterate lazily over every item across all pages.
- [`get()`](postBoxes/get.md)
- [`delete()`](postBoxes/delete.md)

## `projects`

- [`list()`](projects/list.md) — Fetch a single page of results.
- [`all()`](projects/all.md) — Iterate lazily over every item across all pages.
- [`get()`](projects/get.md)
- [`create()`](projects/create.md)
- [`update()`](projects/update.md)
- [`delete()`](projects/delete.md)

## `sepaPayments`

- [`list()`](sepaPayments/list.md) — Fetch a single page of results.
- [`all()`](sepaPayments/all.md) — Iterate lazily over every item across all pages.
- [`get()`](sepaPayments/get.md)
- [`create()`](sepaPayments/create.md)
- [`update()`](sepaPayments/update.md)
- [`delete()`](sepaPayments/delete.md)

## `serialNumbers`

- [`list()`](serialNumbers/list.md) — Fetch a single page of results.
- [`all()`](serialNumbers/all.md) — Iterate lazily over every item across all pages.
- [`get()`](serialNumbers/get.md)
- [`create()`](serialNumbers/create.md)
- [`delete()`](serialNumbers/delete.md)

## `stocks`

- [`list()`](stocks/list.md) — Fetch a single page of results.
- [`all()`](stocks/all.md) — Iterate lazily over every item across all pages.
- [`get()`](stocks/get.md)
- [`create()`](stocks/create.md)

## `tasks`

- [`list()`](tasks/list.md) — Fetch a single page of results.
- [`all()`](tasks/all.md) — Iterate lazily over every item across all pages.
- [`get()`](tasks/get.md)
- [`create()`](tasks/create.md)
- [`update()`](tasks/update.md)
- [`delete()`](tasks/delete.md)

## `textTemplates`

- [`list()`](textTemplates/list.md) — Fetch a single page of results.
- [`all()`](textTemplates/all.md) — Iterate lazily over every item across all pages.
- [`get()`](textTemplates/get.md)
- [`create()`](textTemplates/create.md)
- [`update()`](textTemplates/update.md)
- [`delete()`](textTemplates/delete.md)

## `timeTrackings`

- [`list()`](timeTrackings/list.md) — Fetch a single page of results.
- [`all()`](timeTrackings/all.md) — Iterate lazily over every item across all pages.
- [`get()`](timeTrackings/get.md)
- [`create()`](timeTrackings/create.md)
- [`update()`](timeTrackings/update.md)
- [`delete()`](timeTrackings/delete.md)

## `webhooks`

- [`list()`](webhooks/list.md) — Fetch a single page of results.
- [`all()`](webhooks/all.md) — Iterate lazily over every item across all pages.
- [`get()`](webhooks/get.md)
- [`create()`](webhooks/create.md)
- [`update()`](webhooks/update.md)
- [`delete()`](webhooks/delete.md)

