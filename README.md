# Ingest Feed Service (System:MES,Squad:content_owner)
Fetching video feeds from content owners, sending videos to Ingest Asset Processor

## Relations
* [pushes video metadata to Ingest Asset Processor](https://github.com/glomex/ingest-asset-processor "via HTTP")
* [requests ids from Content Id Service](https://github.com/glomex/mes-content-id-service "via HTTP")
* [requests tenant data from Tenant Service](https://github.com/glomex/mes-madas-tenant-master-data "via HTTP")
* [stores ids to Asset State Service](https://github.com/glomex/asset-state-service "via HTTP")
* [fetches customer-uploaded feeds from FTP](https://github.com/glomex/mes-ftp "via HTTP")

## Technology
* php
* ec2

## Instances
* [qa](http://ingest-feed-service-qa-eu-west-1.dev.mes.glomex.cloud/release)
* [stage](http://ingest-feed-service-staging-eu-west-1.stage.mes.glomex.cloud/release)
* [prod](http://ingest-feed-service-prod-eu-west-1.mes.glomex.cloud/release)
