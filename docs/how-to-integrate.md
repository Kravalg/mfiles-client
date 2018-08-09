How to use M-Files in your Symfony3 app
========================================


1. Update your parameters with the following:
    
    ```yaml
    # app/config/parameters.yml
    parameter:
        # ...
        mfiles.username: YOUR_USERNAME
        mfiles.password: YOUR_PASSWORD
        mfiles.vaultGuid: SERVER_VAULT_GUID
        mfiles.serverUrl: SERVER_URL
    ```

2. Create a helper/bridge joining your business logic to M-Files.   
   
3. Add the following services:

    ```yaml
    # app/config/services.yml
    services:
        # ...
        app.mfiles.client:
            class: MFiles\MFilesClient
            arguments:
                - "@app.mfiles.handler"
         
        app.mfiles.handler:
            class: MFiles\APIHandler
            arguments:
                - %mfiles.serverUrl%
    
        app.mfiles:
            class: AppBundle\MFiles\MFilesBridge
            arguments:
                - "@app.mfiles.client"
    ```

4. Inject your `MFilesBridge` into the classes that you need and call the relevant methods to synchronize M-Files.
