<?php

declare(strict_types=1);

namespace GoSuccess\Easybill;

use GoSuccess\Easybill\Http\Connection;
use GoSuccess\Easybill\Http\CurlHttpClient;
use GoSuccess\Easybill\Http\HttpClient;
use GoSuccess\Easybill\RateLimit\RateLimiter;
use GoSuccess\Easybill\RateLimit\SlidingWindowRateLimiter;
use GoSuccess\Easybill\Resource\AttachmentResource;
use GoSuccess\Easybill\Resource\ContactResource;
use GoSuccess\Easybill\Resource\CustomerGroupResource;
use GoSuccess\Easybill\Resource\CustomerResource;
use GoSuccess\Easybill\Resource\DiscountPositionGroupResource;
use GoSuccess\Easybill\Resource\DiscountPositionResource;
use GoSuccess\Easybill\Resource\DocumentPaymentResource;
use GoSuccess\Easybill\Resource\DocumentResource;
use GoSuccess\Easybill\Resource\LoginResource;
use GoSuccess\Easybill\Resource\PdfTemplateResource;
use GoSuccess\Easybill\Resource\PositionGroupResource;
use GoSuccess\Easybill\Resource\PositionResource;
use GoSuccess\Easybill\Resource\PostBoxResource;
use GoSuccess\Easybill\Resource\ProjectResource;
use GoSuccess\Easybill\Resource\SepaPaymentResource;
use GoSuccess\Easybill\Resource\SerialNumberResource;
use GoSuccess\Easybill\Resource\StockResource;
use GoSuccess\Easybill\Resource\TaskResource;
use GoSuccess\Easybill\Resource\TextTemplateResource;
use GoSuccess\Easybill\Resource\TimeTrackingResource;
use GoSuccess\Easybill\Resource\WebhookResource;

/**
 * Entry point of the easybill API client.
 *
 * Each API resource is exposed as a readonly property, e.g. `$client->customers`.
 */
final class Client
{
    public readonly CustomerResource $customers;
    public readonly ContactResource $contacts;
    public readonly CustomerGroupResource $customerGroups;
    public readonly DocumentResource $documents;
    public readonly DocumentPaymentResource $documentPayments;
    public readonly PositionResource $positions;
    public readonly PositionGroupResource $positionGroups;
    public readonly DiscountPositionResource $discountPositions;
    public readonly DiscountPositionGroupResource $discountPositionGroups;
    public readonly ProjectResource $projects;
    public readonly TaskResource $tasks;
    public readonly TextTemplateResource $textTemplates;
    public readonly TimeTrackingResource $timeTrackings;
    public readonly AttachmentResource $attachments;
    public readonly PostBoxResource $postBoxes;
    public readonly SepaPaymentResource $sepaPayments;
    public readonly SerialNumberResource $serialNumbers;
    public readonly StockResource $stocks;
    public readonly LoginResource $logins;
    public readonly WebhookResource $webhooks;
    public readonly PdfTemplateResource $pdfTemplates;

    /**
     * @param HttpClient|null  $httpClient  Custom transport; defaults to a built-in cURL client.
     * @param RateLimiter|null $rateLimiter Custom rate limiter; defaults to a sliding window sized
     *                                      to {@see ClientConfig::$requestsPerMinute}.
     */
    public function __construct(
        ClientConfig $config,
        ?HttpClient $httpClient = null,
        ?RateLimiter $rateLimiter = null,
    ) {
        $connection = new Connection(
            $config,
            $httpClient ?? new CurlHttpClient($config->timeout, $config->connectTimeout),
            $rateLimiter ?? new SlidingWindowRateLimiter($config->requestsPerMinute),
        );

        $this->customers = new CustomerResource($connection);
        $this->contacts = new ContactResource($connection);
        $this->customerGroups = new CustomerGroupResource($connection);
        $this->documents = new DocumentResource($connection);
        $this->documentPayments = new DocumentPaymentResource($connection);
        $this->positions = new PositionResource($connection);
        $this->positionGroups = new PositionGroupResource($connection);
        $this->discountPositions = new DiscountPositionResource($connection);
        $this->discountPositionGroups = new DiscountPositionGroupResource($connection);
        $this->projects = new ProjectResource($connection);
        $this->tasks = new TaskResource($connection);
        $this->textTemplates = new TextTemplateResource($connection);
        $this->timeTrackings = new TimeTrackingResource($connection);
        $this->attachments = new AttachmentResource($connection);
        $this->postBoxes = new PostBoxResource($connection);
        $this->sepaPayments = new SepaPaymentResource($connection);
        $this->serialNumbers = new SerialNumberResource($connection);
        $this->stocks = new StockResource($connection);
        $this->logins = new LoginResource($connection);
        $this->webhooks = new WebhookResource($connection);
        $this->pdfTemplates = new PdfTemplateResource($connection);
    }
}
