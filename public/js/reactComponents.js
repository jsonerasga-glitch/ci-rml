"use strict";

const e = React.createElement;

//#region Button Component
class Button extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    return e(
      "button",
      {
        onClick: () => {
          console.log(this.props.text);
        },
      },
      this.props.text
    );
  }
}

// Find all DOM containers, and render Like buttons into them.
document.querySelectorAll(".button").forEach((domContainer) => {
  // Read the comment ID from a data-* attribute.
  const text = domContainer.dataset.text;
  ReactDOM.render(e(Button, { text: text }), domContainer);
});

//#endregion

//#region Input Component
class InputHere extends React.Component {
  constructor(props) {
    super(props);
    this.state = { placeholder: this.props.placeholder };
  }
  render() {
    return e("input", { placeholder: this.state.placeholder });
  }
}

document.querySelectorAll(".input").forEach((domContainer) => {
  const type = domContainer.dataset.type;
  const placeholder = domContainer.dataset.placeholder;
  ReactDOM.render(
    e(InputHere, { type: type, placeholder: placeholder }),
    domContainer
  );
});
//#endregion
