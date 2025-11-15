import { createBrowserRouter, Navigate } from 'react-router-dom';
import Signup from './views/Signup';
import Users from './views/Users';
import Login from './views/Login';
import NotFound from './views/NotFound';
import DefaultLayuot from './layouts/DefaultLayout';
import GuestLayuot from './layouts/GuestLayout';
import Dashboard from './views/Dashboard';
import ErrorPage from './errorPage';

const router = createBrowserRouter([
    {
        path: '/react/',
        element: <DefaultLayuot />,
        children: [
            {
                path: '/react/',
                element: <Navigate to="/react/users" />
            },
            {
                path: '/react/dashboard',
                element: <Dashboard />
            },
            {
                path: '/react/users',
                element: <Users />
            },
        ],
    },
    {
        path: '/react/',
        element: <GuestLayuot />,
        errorElement:  <ErrorPage />, // Catches errors for this route and its children children
        children: [
            {
                path: '/react/login',
                element: <Login />
            },
            {
                path: '/react/signup',
                element: <Signup />
            },
        ]
    },
    
    {
        path: '*',
        element: <NotFound />
    },
]);

export default router;
