import { screen} from '@testing-library/react'
// import userEvent from '@testing-library/user-event'
import FormHeader from './form.header';
import { actusBeforeAll, actusRender } from './jest.setup';

beforeAll(actusBeforeAll);

describe('<FormHeader />', () => {
    // AAA: Arrange, Act, Assert
    beforeEach(() => {
        actusRender(<FormHeader />);
    })

    it('shows the MBTI test in 4 steps', () => {
        let steps = screen.getAllByTestId('step-bubble');
        expect(steps.length).toEqual(4);
    })
    
    it('starting in step 1', () => {
        let steps = screen.getAllByTestId('step-bubble');
        expect(steps[0].className.indexOf('active')).toBeTruthy();
    })
})