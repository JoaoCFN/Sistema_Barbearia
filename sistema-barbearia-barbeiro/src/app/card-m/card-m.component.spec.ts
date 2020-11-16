import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CardMComponent } from './card-m.component';

describe('CardMComponent', () => {
  let component: CardMComponent;
  let fixture: ComponentFixture<CardMComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CardMComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CardMComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
