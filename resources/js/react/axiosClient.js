import axios from "axios";
const axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_APP_URL}/api/v1`
});

axiosClient.interceptors.request.use((config) => {
    const token = localStorage.getItem('ACCESS_TOKEN');
    config.headers.Authorization = `Bearer ${token}`;
    return config;
});

axiosClient.interceptors.response.use((response) => {
    return response;
}, (error) => {
    // const { response } = error;
    if (error.response) {
        console.error('Error Status:', error.response.status);
        console.error('Error Data:', error.response.data);
        //Unathorized request was made
        if (error.response.status === 401) {
            localStorage.removeItem('ACCESS_TOKEN');
        }
    } else if (error.request) {
        console.error('Error Request:', error.request);
    } else {
        console.error('Error Message:', error.message);
    }
    throw error;

});
export default axiosClient;