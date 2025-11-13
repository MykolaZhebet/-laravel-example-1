import { createBrowserRouter } from 'react-router-dom';
import Signup from './views/Signup';
import Users from './views/Users';
import Login from './views/Login';
import NotFound from './views/NotFound';

const router = createBrowserRouter([
    {
        path: '/react/login',
        element: <Login />
    },
    {
        path: '/react/signup',
        element: <Signup />
    },
    {
        path: '/react/sers',
        element: <Users />
    },
    {
        path: '*',
        element: <NotFound />
    },
]);

export default router;
