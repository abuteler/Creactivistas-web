import React from 'react';
import FormQuestion from './FormQuestion';


class FormQuestionGroup extends React.Component {
  render() {
      const { questionGroup, handleChange } = this.props;
    return (
        <div style={{
            marginTop: 15,
            marginBottom: 15,
        }}>
            {
                questionGroup.map((question, i) => (
                    <FormQuestion
                        key={i}
                        id={question.id}
                        label={question.label}
                        value={question.value || 0}
                        handleChange={handleChange}
                        index={i}
                    />
                ))
            }
        </div>
    );
  }
}
  
export default FormQuestionGroup;