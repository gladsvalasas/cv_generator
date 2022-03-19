import Cookies from 'js-cookie';
import axios from "axios";

class Api {

    static bearerToken = Cookies.get("_APIBEARER");

    static headersOption = {
        headers: {
            'Authorization': 'Bearer ' + Api.bearerToken,
            'Accept': "application/json",
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    };

    static endpoint = "/api/endpoint/";

    static delete(method, id)
    {
        return axios.delete(Api.endpoint+method+"/delete/"+id, Api.headersOption);
    }

    static add(method, data)
    {
        return axios.post(Api.endpoint+method+"/create/", data, Api.headersOption);
    }

    static get(method, id)
    {
        return axios.get(Api.endpoint+method+"/get/"+id, Api.headersOption);
    }
}

export default Api;
