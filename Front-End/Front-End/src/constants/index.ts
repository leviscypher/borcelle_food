import routeApis from './route-apis'

export interface ConstantsProps {
    routeApis: typeof routeApis
}

const constants: ConstantsProps = {
    routeApis,
}

export default constants
