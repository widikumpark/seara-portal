import Axios from "axios";

export default{
    data(){
        return {}
    },
methods:{
    callApi(method, url, datObj){
        try {
          return  axios({
                method: method,
                url: url,
                datObj: datObj
            });
        } catch (error) {
            return error.response;
        }
    }
}

}