M-Files Client Documentation
========================================

**Authorize Client**

~~~~
authorize(
  string $username,
  string $password,
  string $vaultGuid
)

$username - M-Files username
$password - M-Files password
$vaultGuid - uuid M-Files server
~~~~

***return [GetAuthTokenResponse](../src/MFiles/Service/User/Response/GetAuthTokenResponse.php)***

*****

**Get all documents**

~~~~
getAllDocuments()

~~~~

***return [GetObjectsResponse](../src/MFiles/Service/Object/Response/GetObjectsResponse.php)***

*****

**Get all document roots**

~~~~
getRootViewItems()
~~~~

***return [GetViewItemsResponse](../src/MFiles/Service/View/Response/GetViewItemsResponse.php)***

*****

**Get Items from view**

~~~~
getItemsFromView(
  int $viewId
)
~~~~

***return [GetItemsFromViewResponse](../src/MFiles/Service/View/Item/Response/GetItemsFromViewResponse.php)***

*****

**Search**

~~~~
searchResult(
  string $searchRequest
)

$searchRequest - search query
~~~~

***return [SearchResponse](../src/MFiles/Service/Search/Response/SearchResponse.php)***

*****

**Download file**

~~~~
downloadFile(
  int $fileID,
  int $objectType,
  int $objectID,
  string $objectVersion = 'latest'
)
    
$fileID - file identificator
$objectType - file object type
$objectID - file object identificator
$objectVersion - file object version (latest by default)
~~~~

***return [DownloadFileResponse](../src/MFiles/Service/File/Response/DownloadFileResponse.php)***

*****

**Get API handler**

~~~~
getApiHandler()
~~~~

***return [APIHandler](../src/MFiles/APIHandler.php)***