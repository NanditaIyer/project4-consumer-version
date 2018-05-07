import React, { Component } from "react";
import { Jumbotron, Container } from "reactstrap";
class Header extends Component {
  render() {
    return (
      <Jumbotron className="app-banner hidden-load animated fadeIn">
        <Container>
          <h1 className="display-3 banner-title">
            THINKETH...
            </h1>
            <p>  </p>
            <p className="quote">“As a man thinketh in his heart, so shall he be”
― James Allen, As a Man Thinketh</p>
<p> </p>
<p> </p>
          <p className="lead">
            Gain insight into how and why people think, act, and feel the way
            they do. The underlying AI applies linguistic analytics and
            personality theory to infer attributes from a person's unstructured
            text or Twitter feed.
          </p>
          <p>
            <small>
              Powered by <a href="https://www.ibm.com/watson">IBM Watson</a>
              {""} / Developed by {""}
              <a href="https://github.com/NanditaIyer">Nandita Iyer</a>
            </small>
          </p>
        </Container>
      </Jumbotron>
    );
  }
}

export default Header;
