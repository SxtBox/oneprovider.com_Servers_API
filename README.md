# oneprovider.com Servers API

    Make call to the OneProvider api
    Implementation details
    All calls are grouped by namespaces ("server", "vm", "store", "support").
    Supported HTTP methods are GET and POST.
    Any successful API call will return an HTTP code 200 with a JSON object.
    Errors are returned with an HTTP code 8XX, a JSON object "error" with properties "message" and "code".
    All API methods require authentication using both the API and CLIENT keys.

    Using the API
    To log into the API, you must use the two privates access keys below. These keys are unique and linked to your account.

    Your Personal API key is: API_lhftwgb0D7IuFav1R4Qf1GMvVMVDwo3e
    Your Secret CLIENT key is: CK_3OpmK2WSBP3mRVZzVF1tORZxNfHjR0Ig

    Documentation
    To use any function of the API, you must call it with the requested parameters and the access token* at this url: https://api.oneprovider.com/[action]
